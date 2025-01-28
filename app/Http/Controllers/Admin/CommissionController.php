<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\AgencyCommission;
use App\Models\Client;
use App\Models\Permission;
use App\Models\User;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-commission'])->only(['index', 'show']);
        $this->middleware(['permission:create-commission'])->only(['create', 'store']);
        $this->middleware(['permission:edit-commission'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-commission'])->only('destroy');
    }

    /**
     * Display a listing of the commissions.
     */
    public function index()
    {
        $title = 'Commissions';
        $commissions = AgencyCommission::orderBy('created_at', 'DESC')->get();

//        dd($commissions);
        return view('admin.agency_commission.index', compact('title', 'commissions'));
    }


    /**
     * Show the form for creating a new agency_commission.
     */
    public function create()
    {
        $title = 'Add Commission';
        $clients = Client::all();
        return view('admin.agency_commission.create', compact('title', 'clients'));
    }

    /**
     * Store a newly created commission in the database.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'policy_number' => 'required',
            'date' => 'required',
            'transaction' => 'required',
            'pro_premium' => 'required',
            'commission' => 'required',
            'paid' => 'required',
            'due' => 'required',
            'notes' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Commission data
            $data = $validator->validated();
            $data['pro_premium'] = removeDollarSign($data['pro_premium']);
            $data['commission'] = removeDollarSign($data['commission']);
            $data['paid'] = removeDollarSign($data['paid']);
            $data['due'] = removeDollarSign($data['due']);
            // Create the commission record
            AgencyCommission::create($data);

            DB::commit();

            return redirect()->route('show-commission')->with('success', 'Commission created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an agency_commission.
     */
    public function edit($id)
    {
        $commission = AgencyCommission::find($id);

        if (!$commission) {
            return redirect()->route('show-commission')->with('error', 'Commission not found.');
        }

        $title = 'Edit Commission';
        $clients = Client::all();


        return view('admin.agency_commission.edit', compact(
            'title',
            'commission',
            'clients'
        ));
    }


    /**
     * Update an existing commission in the database.
     */
    public function update(Request $request, $id)
    {
        $commission = AgencyCommission::find($id);

        if (!$commission) {
            return redirect()->route('show-commission')->with('error', 'Commission not found.');
        }

        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'policy_number' => 'required',
            'date' => 'required',
            'transaction' => 'required',
            'pro_premium' => 'required',
            'commission' => 'required',
            'paid' => 'required',
            'due' => 'required',
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
            $data['pro_premium'] = removeDollarSign($data['pro_premium']);
            $data['commission'] = removeDollarSign($data['commission']);
            $data['paid'] = removeDollarSign($data['paid']);
            $data['due'] = removeDollarSign($data['due']);

            // Update commission details
            $commission->update($data);



            DB::commit();
            return redirect()->route('show-commission')->with('success', 'Commission and User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an agency_commission.
     */
    public function destroy(Request $request)
    {

        $commission = AgencyCommission::find($request->id);

        if (!$commission) {
            return response()->json(['error' => 'Commission not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the commission
            $commission->delete();
            DB::commit();

            return response()->json(['success' => 'Commission deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Commissions';
        $commissions = AgencyCommission::onlyTrashed()
             ->orderBy('deleted_at', 'DESC')
            ->get();

        return view('admin.agency_commission.trashed', compact('title', 'commissions'));
    }

    public function restore($id)
    {
        $commission = AgencyCommission::onlyTrashed()->findOrFail($id);
        $commission->restore();

        return redirect()->route('trashed-commissions')->with('success', 'Commission restored successfully.');
    }

    public function forceDelete($id)
    {
        $commission = AgencyCommission::onlyTrashed()->findOrFail($id);
        $commission->forceDelete();

        return redirect()->route('trashed-commissions')->with('success', 'Commission permanently deleted.');
    }

}
