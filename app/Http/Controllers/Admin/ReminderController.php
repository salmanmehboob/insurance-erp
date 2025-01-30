<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\InsuranceCompany;
use App\Models\Reminder;
use App\Models\Client;
use App\Models\Permission;
use App\Models\User;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ReminderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-reminder'])->only(['index', 'show']);
        $this->middleware(['permission:create-reminder'])->only(['create', 'store']);
        $this->middleware(['permission:edit-reminder'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-reminder'])->only('destroy');
    }

    /**
     * Display a listing of the reminders.
     */
    public function index()
    {
        $title = 'Reminders';
        $reminders = Reminder::orderBy('created_at', 'DESC')->get();
        LogActivity::addToLog('Agency Reminders Listing Viewed');

//        dd($reminders);
        return view('admin.reminder.index', compact('title', 'reminders'));
    }


    /**
     * Show the form for creating a new reminder.
     */
    public function create()
    {
        $title = 'Add Reminder';
        $clients = Client::all();
        $agents = Agent::with('user')->get();
        $insuranceCompanies = InsuranceCompany::all();
        return view('admin.reminder.create', compact('title', 'clients', 'agents', 'insuranceCompanies'));
    }

    /**
     * Store a newly created reminder in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'from_id' => 'required',
            'to_id' => 'required',
            'date' => 'required',
            'set_reminder' => 'required',
            'is_critical' => 'nullable',
            'insurance_company_id' => 'required',
            'notes' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Reminder data
            $data = $validator->validated();

//            dd($data);
            // Create the reminder record
            Reminder::create($data);

            DB::commit();
            LogActivity::addToLog('Reminder  of  ' . $data['notes'] . ' Created');

            return redirect()->route('show-reminder')->with('success', 'Reminder created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an reminder.
     */
    public function edit($id)
    {
        $reminder = Reminder::find($id);

        if (!$reminder) {
            return redirect()->route('show-reminder')->with('error', 'Reminder not found.');
        }

        $title = 'Edit Reminder';
        $clients = Client::all();
        $agents = Agent::with('user')->get();
        $insuranceCompanies = InsuranceCompany::all();


        return view('admin.reminder.edit', compact(
            'title',
            'reminder',
            'clients', 'agents', 'insuranceCompanies'
        ));
    }


    /**
     * Update an existing reminder in the database.
     */
    public function update(Request $request, $id)
    {
         $reminder = Reminder::find($id);

        if (!$reminder) {
            return redirect()->route('show-reminder')->with('error', 'Reminder not found.');
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'from_id' => 'required',
            'to_id' => 'required',
            'date' => 'required',
            'set_reminder' => 'required',
            'is_critical' => 'nullable',
            'insurance_company_id' => 'required',
            'notes' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Validated data
            $data = $validator->validated();
            $data['is_critical'] = $request->is_critical == 1 ? true : false;

            // Update reminder details
            $reminder->update($data);

            DB::commit();
            LogActivity::addToLog(' Reminders  Updated');

            return redirect()->route('show-reminder')->with('success', 'Reminder  updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an reminder.
     */
    public function destroy(Request $request)
    {

        $reminder = Reminder::find($request->id);

        if (!$reminder) {
            return response()->json(['error' => 'Reminder not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the reminder
            $reminder->delete();
            DB::commit();
            LogActivity::addToLog(' Reminders ' . $reminder->id . ' deleted');

            return response()->json(['success' => 'Reminder deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Reminders';
        $reminders = Reminder::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->get();
        LogActivity::addToLog(' Reminders Trashed Listing Viewed');

        return view('admin.reminder.trashed', compact('title', 'reminders'));
    }

    public function restore($id)
    {
        $reminder = Reminder::onlyTrashed()->findOrFail($id);
        $reminder->restore();
        LogActivity::addToLog(' Reminders ' . $reminder->id . ' restored');

        return redirect()->route('trashed-reminders')->with('success', 'Reminder restored successfully.');
    }

    public function forceDelete($id)
    {
        $reminder = Reminder::onlyTrashed()->findOrFail($id);
        $reminder->forceDelete();
        LogActivity::addToLog(' Reminders ' . $reminder->id . ' permanently deleted');

        return redirect()->route('trashed-reminders')->with('success', 'Reminder permanently deleted.');
    }

}
