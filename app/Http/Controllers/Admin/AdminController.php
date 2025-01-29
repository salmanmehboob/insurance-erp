<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidate;
use App\Http\Traits\CandidateTrait;
use App\Http\Traits\EmployerTrait;
use App\Http\Traits\MentorTrait;
use App\Models\Complaint;
use App\Models\Intern;
use App\Models\User;
 use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

//use Laravie\Codex\Contracts\Response;
//use Laravie\Codex\Transport\Curl;

class AdminController extends Controller
{




    public function updatePassword()
    {
        $userID = Auth::user()->id;
        return view('auth.updatePassword')->with(['title' => 'Change Password', 'userID' => $userID]);
    }

    public function ChangePassword(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('update-password')
                ->withErrors($validator)
                ->withInput();
        }

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            if (!Hash::check($request->password, $hashedPassword)) {

                $users = User::find(Auth::user()->id);
                $users->password = $request->password;
                $user = User::where('id', Auth::user()->id)->update(array('password' => $users->password));
                return redirect()->back()->with('success', "Password Change successfully");
            } else {
                return redirect()->back()->with('error', "New password can not be the old password!");
            }
        } else {
            return redirect()->back()->with('error', "Old password doesnt matched");
        }
    }


    public function logActivityLists(Request $request)
    {
        $title = 'Activity Logs';

        if ($request->ajax()) {
            $logs = LogActivity::logActivityLists();

            return DataTables::of($logs)
                ->addColumn('user', function ($log) {
                    return $log->user->name;
                })->addColumn('subject', function ($log) {
                    return $log->subject;
                })->addColumn('url', function ($log) {
                    return '<a href="'.$log->url.'" target="_blank">URL</a>';;
                })->addColumn('method', function ($log) {
                    return $log->method;
                })->addColumn('ip', function ($log) {
                    return $log->ip;
                })->addColumn('agent', function ($log) {
                    return $log->agent;
                })
                ->addColumn('created_at', function ($log) {
                    return showDateTime($log->created_at);
                })
                ->rawColumns(['url'])

                ->make(true);
        }

        return view('auth.activity_logs', compact('title'));
    }
}


