<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeTrackerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('sales');
    }
    
    public function TimeTracker(){
        return view('sales.timetracker');
    }

    public function SaveTimesTracking(Request $request){
        dd($request->all());
        $date = $request['date'];
        $punchInTime = $request['punchInTime'];
        $breakInTime = $request['breakInTime'];
        $breakOutTime = $request['breakOutTime'];
        $punchOutTime = $request['punchOutTime'];
        $loginTime = $request['loginTime'];
        $logoutTime = $request['logoutTime'];


        $user = auth()->user();
        $user->definetimetracking()->create([
            "date" => $date,
            "punchInTime" => $punchInTime,
            "breakInTime" => $breakInTime,
            "breakOutTime" => $breakOutTime,
            "punchOutTime" => $punchOutTime,
            "loginTime" => $loginTime,
            "logoutTime" =>  $logoutTime,
        ]);

        $user->definetimetracking()->update([
            "date" => $date,
            "punchInTime" => $punchInTime,
            "breakInTime" => $breakInTime,
            "breakOutTime" => $breakOutTime,
            "punchOutTime" => $punchOutTime,
            "loginTime" => $loginTime,
            "logoutTime" =>  $logoutTime,
        ]);
    }
}
