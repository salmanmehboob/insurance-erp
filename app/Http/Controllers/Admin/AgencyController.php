<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\BankAccount;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-agencies'])->only(['index', 'show']);
        $this->middleware(['permission:create-agencies'])->only(['create', 'store']);
        $this->middleware(['permission:edit-agencies'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-agencies'])->only('destroy');
    }

    /**
     * Display a listing of the agencies.
     */
    public function index()
    {
        $agencies = Agency::with('state', 'bank')->orderBy('created_at', 'DESC')->get();
        $title = 'Agencies';
        return view('admin.agency.index', compact('title', 'agencies'));
    }

    /**
     * Show the form for creating a new agency.
     */
    public function create()
    {
        $title = 'Add Agency';
        $states = UsState::all();
        $banks = BankAccount::all();
        return view('admin.agency.create', compact('title', 'states', 'banks'));
    }

    /**
     * Store a newly created agency in the database.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'agency_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone' => 'required|string|max:15',
            'secondary_phone' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'account_number' => 'nullable|string|max:255',
            'bank_id' => 'nullable|exists:bank_accounts,id',
            'custom_message' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $data = $validator->validated();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $data['logo'] = $logoPath;
            }

            Agency::create($data);

            DB::commit();
            return redirect()->route('show-agency')->with('success', 'Agency created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an agency.
     */
    public function edit($id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return redirect()->route('admin.agencies.index')->with('error', 'Agency not found.');
        }

        $title = 'Edit Agency';
        $states = UsState::all();
        $banks = BankAccount::all();
        return view('admin.agency.edit', compact('title', 'agency', 'states', 'banks'));
    }

    /**
     * Update an existing agency in the database.
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);

        if (!$agency) {
            return redirect()->route('admin.agencies.index')->with('error', 'Agency not found.');
        }

        $validator = Validator::make($request->all(), [
            'agency_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone' => 'required|string|max:15',
            'secondary_phone' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'account_number' => 'nullable|string|max:255',
            'bank_id' => 'nullable|exists:banks,id',
            'custom_message' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $data = $validator->validated();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($agency->logo && \Storage::exists('public/' . $agency->logo)) {
                    \Storage::delete('public/' . $agency->logo);
                }

                $logoPath = $request->file('logo')->store('logos', 'public');
                $data['logo'] = $logoPath;
            }

            $agency->update($data);

            DB::commit();
            return redirect()->route('admin.agencies.index')->with('success', 'Agency updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an agency.
     */
    public function destroy(Request $request)
    {

         $agency = Agency::find($request->id);

        if (!$agency) {
            return response()->json(['error' => 'Agency not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the agency
            $agency->delete();
            DB::commit();

            return response()->json(['success' => 'Agency deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
}
