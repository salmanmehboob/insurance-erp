<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Company;
use App\Models\CompanyAgency;
use App\Models\BankAccount;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyAttachment;
use App\Models\Permission;
use App\Models\User;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class InsuranceCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-company'])->only(['index', 'show']);
        $this->middleware(['permission:create-company'])->only(['create', 'store']);
        $this->middleware(['permission:edit-company'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-company'])->only('destroy');
    }

    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        $insuranceCompanies = InsuranceCompany::orderBy('created_at', 'DESC')->get();
        $title = 'Companies';
        return view('admin.company.index', compact('title', 'insuranceCompanies'));
    }


    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        $title = 'Add Company';
        $states = UsState::all();
        $banks = BankAccount::all();
        $agencies = Agency::all();
        $permissions = Permission::where('module', 4)->get();
        return view('admin.company.create', compact('title', 'states', 'banks', 'agencies', 'permissions'));
    }

    /**
     * Store a newly created company in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone_no' => 'required|string',
            'fax_no' => 'required|string',
            'website' => 'required|string',
            'agency_code' => 'required|string',
            'note' => 'required|string',
            'commission_in_percentage' => 'nullable|numeric',

        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Get validated data
            $data = $validator->validated();

            // Create the company record
            $companyDbData = [
                'name' => $data['name'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state_id' => $data['state_id'],
                'zip_code' => $data['zip_code'],
                'phone_no' => $data['phone_no'],
                'fax_no' => $data['fax_no'],
                'website' => $data['website'],
                'agency_code' => $data['agency_code'],
                'note' => $data['note'],
                'commission_in_percentage' => $data['commission_in_percentage'] ?? null,
            ];

            $company = InsuranceCompany::create($companyDbData);


            // Handle attachments if any are uploaded
            if ($request->hasFile('attachment_file')) {
                $attachmentNames = $request->attachment_name ?? [];
                $attachmentFiles = $request->file('attachment_file');

                foreach ($attachmentFiles as $index => $file) {
                    $filename = $file->getClientOriginalName();
                    $path = $file->store('insurance_company_attachments', 'public'); // Store in "attachments" folder
                    // Create attachment record for each uploaded file
                    InsuranceCompanyAttachment::create([
                        'insurance_company_id' => $company->id,
                        'attachment_name' => $attachmentNames[$index] ?? $filename,  // Use provided name or file name
                        'path' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('show-company')->with('success', 'Company and User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an company.
     */
    public function edit($id)
    {
        $company = InsuranceCompany::find($id);

        if (!$company) {
            return redirect()->route('show-company')->with('error', 'Company not found.');
        }

        $title = 'Edit Company';
        $states = UsState::all();
        $banks = BankAccount::all();
//        dd($company->attachments);
        return view('admin.company.edit', compact('title', 'company', 'states', 'banks'));
    }


    /**
     * Update an existing company in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone_no' => 'required|string',
            'fax_no' => 'required|string',
            'website' => 'required|string',
            'agency_code' => 'required|string',
            'note' => 'required|string',
            'commission_in_percentage' => 'nullable|numeric',
            'attachment_id.*' => 'nullable|integer|exists:insurance_company_attachments,id', // Existing attachment IDs
            'attachment_name.*' => 'nullable|string|max:255',
            'attachment_file.*' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048', // File validation rules
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $data = $validator->validated();

            // Find the existing company
            $company = InsuranceCompany::findOrFail($id);

            // Update company details
            $company->update([
                'name' => $data['name'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state_id' => $data['state_id'],
                'zip_code' => $data['zip_code'],
                'phone_no' => $data['phone_no'],
                'fax_no' => $data['fax_no'],
                'website' => $data['website'],
                'agency_code' => $data['agency_code'],
                'note' => $data['note'],
                'commission_in_percentage' => $data['commission_in_percentage'] ?? null,
            ]);

            // Get all existing attachment IDs from the database
            $existingAttachmentIds = $company->attachments()->pluck('id')->toArray();

            // Get submitted attachment IDs from the form
            $submittedAttachmentIds = $data['attachment_id'] ?? [];

            // Find IDs to delete
            $attachmentsToDelete = array_diff($existingAttachmentIds, $submittedAttachmentIds);

            // Delete removed attachments
            if (!empty($attachmentsToDelete)) {
                $attachments = InsuranceCompanyAttachment::whereIn('id', $attachmentsToDelete)->get();
                foreach ($attachments as $attachment) {
                    // Delete file from storage
                    Storage::disk('public')->delete($attachment->path);
                    // Delete record from database
                    $attachment->delete();
                }
            }

            // Handle existing attachments that are updated
            foreach ($submittedAttachmentIds as $index => $attachmentId) {
                if ($attachmentId) {
                    $attachment = InsuranceCompanyAttachment::findOrFail($attachmentId);
                    $attachment->update([
                        'attachment_name' => $data['attachment_name'][$index],
                    ]);

                    // If a new file is uploaded, replace the existing one
                    if (isset($request->file('attachment_file')[$index])) {
                        $file = $request->file('attachment_file')[$index];
                        $path = $file->store('insurance_company_attachments', 'public');
                        // Delete the old file
                        Storage::disk('public')->delete($attachment->path);
                        // Update the path
                        $attachment->update(['path' => $path]);
                    }
                }
            }

            // Handle new attachments
            $attachmentFiles = $request->file('attachment_file') ?? [];
            foreach ($attachmentFiles as $index => $file) {
                if (empty($submittedAttachmentIds[$index])) {
                    $filename = $file->getClientOriginalName();
                    $path = $file->store('insurance_company_attachments', 'public');
                    $company->attachments()->create([
                        'attachment_name' => $data['attachment_name'][$index] ?? $filename,
                        'path' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('show-company')->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an company.
     */
    public function destroy(Request $request)
    {

        $company = InsuranceCompany::find($request->id);

        if (!$company) {
            return response()->json(['error' => 'Company not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the company
            $company->delete();
            DB::commit();

            return response()->json(['success' => 'Company deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
}
