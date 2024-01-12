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
        // dd($request->all());
        $date = $request['date'];
        $punchInTime = $request['punchInTime'];
        $breakInTime = $request['breakInTime'];
        $breakOutTime = $request['breakOutTime'];
        $punchOutTime = $request['punchOutTime'];
        $loginTime = $request['loginTime'];
        $logoutTime = $request['logoutTime'];

        $entry = auth()->user()->definetimetracking()->where('date', $date)->firstOrNew();
        $user = auth()->user();
        if (!$entry->exists) {
            $user->definetimetracking()->create([
                "date" => $date,
                "punch_in_time" => $punchInTime,
                "break_in_time" => $breakInTime,
                "break_out_time" => $breakOutTime,
                "punch_out_time" => $punchOutTime,
                "login_time" => $loginTime,
                "logout_time" =>  $logoutTime,
            ]);
        }
        else{
            $user->definetimetracking()->update([
                "punch_in_time" => $punchInTime,
                "break_in_time" => $breakInTime,
                "break_out_time" => $breakOutTime,
                "punch_out_time" => $punchOutTime,
                "login_time" => $loginTime,
                "logout_time" =>  $logoutTime,
            ]);
        }
        return redirect()->route('timetracker')->with('success', 'Time Updated successfully');
        
    }

    public function showhistory()
    {
        return view('sales.showhistory');
    }
}
