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
                "logout_time" =>  $punchOutTime,
            ]);
        }
        else{
            $user->definetimetracking()->update([
                "punch_in_time" => $punchInTime,
                "break_in_time" => $breakInTime,
                "break_out_time" => $breakOutTime,
                "punch_out_time" => $punchOutTime,
                "login_time" => $loginTime,
                "logout_time" =>  $punchOutTime,
            ]);
        }
        return redirect()->route('timetracker')->with('success', 'Time Updated successfully');
        
    }

    public function showhistory()
    {
        return view('sales.showhistory');
    }

    public function FilterTimeHistory(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filteredEntries = auth()
            ->user()
            ->definetimetracking()
            ->whereBetween('date', [$start_date, $end_date])
            ->get();

        return view('sales.showhistory', compact('filteredEntries'));
    }

    public function TimeHistoryForAllUsers(Request $request){
        $selected_date = $request->input('selected_date');
    
        $filteredEntries = definetimetracking::whereDate('date', $selected_date)
            ->get();
    
        return view('sales.showhistory', compact('filteredEntries'));
    }
}
