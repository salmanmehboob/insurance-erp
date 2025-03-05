<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\ClientPolicy;
use App\Models\InventoryRequest;
use App\Models\LeaveRequest;
use App\Models\MeetingSchedule;
use App\Models\Project;
use App\Models\VehicleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index(Request $request)
    {
        // Check if any filters are applied
        $hasFilters = $request->filled('client_name') ||
            $request->filled('policy_number') ||
            $request->filled('phone_number') ||
            $request->filled('file_number') ||
            $request->filled('insurance_company') ||
            $request->filled('policy_type_id') ||
            $request->filled('location') ||
            $request->filled('policy_status');

        // Fetch dropdown data
        $policyStatuses = DB::table('policy_statuses')->get();
        $policyTypes = DB::table('policy_types')->get();
        $agencies = DB::table('agencies')->get();

        // If no filters, return view without fetching policies
        if (!$hasFilters) {
            return view('home', [
                'policies' => collect([]), // Empty collection
                'policyStatuses' => $policyStatuses,
                'policyTypes' => $policyTypes,
                'agencies' => $agencies,
            ]);
        }

        // Query policies with relationships
        $query = ClientPolicy::with('client.language', 'insuranceCompany', 'policyStatus', 'agency', 'agent');

        if ($request->filled('client_name')) {
            $query->whereHas('client', function ($q) use ($request) {
                $q->where('applicant_name', 'LIKE', '%' . $request->client_name . '%');
            });
        }

        if ($request->filled('policy_number')) {
            $query->where('policy_number', $request->policy_number);
        }

        if ($request->filled('phone_number')) {
            $query->whereHas('client', function ($q) use ($request) {
                $q->where('home_phone_no', 'LIKE', '%' . $request->phone_number . '%')
                    ->orWhere('cell_phone_no', 'LIKE', '%' . $request->phone_number . '%')
                    ->orWhere('work_phone_no', 'LIKE', '%' . $request->phone_number . '%')
                    ->orWhere('fax_phone_no', 'LIKE', '%' . $request->phone_number . '%');
            });
        }

        if ($request->filled('file_number')) {
            $query->where('file_number', $request->file_number);
        }

        if ($request->filled('insurance_company')) {
            $query->whereHas('insuranceCompany', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->insurance_company . '%');
            });
        }

        if ($request->filled('policy_type_id')) {
            $query->whereHas('client', function ($q) use ($request) {
                $q->where('policy_type_id', $request->policy_type_id);
            });
        }

        if ($request->filled('location')) {
            $query->where('agency_id', $request->location);
        }

        if ($request->filled('policy_status')) {
            $query->where('policy_status_id', $request->policy_status);
        }

        // Paginate policies
        $policies = $query->paginate(10);


        return view('home', [
            'policies' => $policies,
            'policyStatuses' => $policyStatuses,
            'policyTypes' => $policyTypes,
            'agencies' => $agencies,
        ]);
    }

}
