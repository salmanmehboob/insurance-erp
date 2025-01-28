<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\BankAccount;
use App\Models\Permission;
use App\Models\User;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-bank'])->only(['index', 'show']);
        $this->middleware(['permission:create-bank'])->only(['create', 'store']);
        $this->middleware(['permission:edit-bank'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-bank'])->only('destroy');
    }

    /**
     * Display a listing of the banks.
     */
    public function index()
    {
        $title = 'Banks';
        $banks = BankAccount::orderBy('created_at', 'DESC')->get();

//        dd($banks);
        return view('admin.bank.index', compact('title', 'banks'));
    }


    /**
     * Show the form for creating a new bank.
     */
    public function create()
    {
        $title = 'Add Bank';
        $agencies = Agency::all();
        return view('admin.bank.create', compact('title', 'agencies'));
    }

    /**
     * Store a newly created bank in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc_code' => 'required',
            'account_type' => 'required',
            'current_balance' => 'required',
            'current_check' => 'required',
            'agency_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Bank data
            $data = $validator->validated();
            $data['current_balance'] = removeDollarSign($data['current_balance']);
            // Create the bank record
            BankAccount::create($data);

            DB::commit();

            return redirect()->route('show-bank')->with('success', 'Bank created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an bank.
     */
    public function edit($id)
    {
        $bank = BankAccount::find($id);

        if (!$bank) {
            return redirect()->route('show-bank')->with('error', 'Bank not found.');
        }

        $title = 'Edit Bank';
        $agencies = Agency::all(); // Assuming `Agency` model for locations

        return view('admin.bank.edit', compact(
            'title',
            'bank',
            'agencies'
        ));
    }


    /**
     * Update an existing bank in the database.
     */
    public function update(Request $request, $id)
    {
        $bank = BankAccount::find($id);

        if (!$bank) {
            return redirect()->route('show-bank')->with('error', 'Bank not found.');
        }

        $validator = Validator::make($request->all(), [
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc_code' => 'required',
            'account_type' => 'required',
            'current_balance' => 'required',
            'current_check' => 'required',
            'agency_id' => 'required'
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
            $data['current_balance'] = removeDollarSign($data['current_balance']);

            // Update bank details
            $bank->update($data);



            DB::commit();
            return redirect()->route('show-bank')->with('success', 'Bank and User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an bank.
     */
    public function destroy(Request $request)
    {

        $bank = BankAccount::find($request->id);

        if (!$bank) {
            return response()->json(['error' => 'Bank not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the bank
            $bank->delete();
            DB::commit();

            return response()->json(['success' => 'Bank deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Banks';
        $banks = BankAccount::onlyTrashed()
             ->orderBy('deleted_at', 'DESC')
            ->get();

        return view('admin.bank.trashed', compact('title', 'banks'));
    }

    public function restore($id)
    {
        $bank = BankAccount::onlyTrashed()->findOrFail($id);
        $bank->restore();

        return redirect()->route('trashed-banks')->with('success', 'Bank restored successfully.');
    }

    public function forceDelete($id)
    {
        $bank = BankAccount::onlyTrashed()->findOrFail($id);
        $bank->forceDelete();

        return redirect()->route('trashed-banks')->with('success', 'Bank permanently deleted.');
    }

}
