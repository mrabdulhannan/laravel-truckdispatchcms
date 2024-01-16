<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;
use App\Models\SalesDailyUpdate;
use Carbon\Carbon;
// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showallusertimehistory(Request $request)
    {
        $selected_date = $request->input('selected_date', now()->toDateString());

    $filteredEntries = TimeTracker::whereDate('date', $selected_date)
        ->with('user')
        ->get();

    return view('admin.showallusertimehistory', compact('filteredEntries'));
    }

    public function TimeHistoryForAllUsers(Request $request){
        $selected_date = $request->input('selected_date');
        
        $filteredEntries = TimeTracker::whereDate('date', $selected_date)
            ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
            ->get();
        
        return view('admin.showallusertimehistory', compact('filteredEntries'));
    }

    public function UpdateHistoryForAllSalesUsers(Request $request){
        $selected_date = $request->input('selected_date', now()->toDateString());

        $filteredEntries = SalesDailyUpdate::whereDate('date', $selected_date)
            ->with('user')
            ->get();
        
        return view('admin.updatesforallsales', compact('filteredEntries'));
    }

    public function FilterUpdateHistoryForSalesUsers(Request $request){
        $selected_date = $request->input('selected_date');
        
        $filteredEntries = SalesDailyUpdate::whereDate('date', $selected_date)
            ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
            ->get();
        
        return view('admin.updatesforallsales', compact('filteredEntries'));
    }

    // public function GetMonthlyHours(Request $request){
    //     $selectedDate = $request->input(now()->toDateString());

    //     // Convert the selected date to a Carbon instance
    //     $selectedDateCarbon = \Carbon\Carbon::parse($selectedDate);

    //     // Get the month from the selected date
    //     $month = $selectedDateCarbon->month;

    //     // If you need the month as a string (e.g., '01' for January)
    //     $monthString = $selectedDateCarbon->format('m');

    //     $filteredEntries = TimeTracker::whereMonth('date', $month)
    //         ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
    //         ->get();
        
    //     return view('admin.monthlytimehistory', compact('filteredEntries'));
    // }

    public function ShowMonthlyTimeHistory(){
        return view('admin.monthlytimehistory');

    }

    // public function GetMonthlyHours(Request $request){
    //     $selectedDate = $request->input(now()->toDateString());
    
    //     // Convert the selected date to a Carbon instance
    //     $selectedDateCarbon = \Carbon\Carbon::parse($selectedDate);
    
    //     // Get the month from the selected date
    //     $month = $selectedDateCarbon->month;
    
    //     // If you need the month as a string (e.g., '01' for January)
    //     $monthString = $selectedDateCarbon->format('m');
    
    //     $filteredEntries = TimeTracker::whereMonth('date', $month)
    //         ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
    //         ->get();
    
    //     // Initialize an associative array to store total working hours for each user
    //     $userTotalHours = [];
    
    //     // Calculate the working hours minus break time for each entry
    //     foreach ($filteredEntries as $entry) {
    //         // Convert time strings to \DateTime objects
    //         $punchInTime = $entry->punch_in_time ? \DateTime::createFromFormat('H:i:s', $entry->punch_in_time) : null;
    //         $punchOutTime = $entry->punch_out_time ? \DateTime::createFromFormat('H:i:s', $entry->punch_out_time) : null;
    
    //         // Calculate the time difference for each pair of punch in and punch out
    //         if ($punchInTime && $punchOutTime) {
    //             $workingHours = $punchInTime->diff($punchOutTime)->format('%H:%I:%S');
                
    //             // Subtract break time if available
    //             if ($entry->break_in_time && $entry->break_out_time) {
    //                 $breakInTime = \DateTime::createFromFormat('H:i:s', $entry->break_in_time);
    //                 $breakOutTime = \DateTime::createFromFormat('H:i:s', $entry->break_out_time);
    //                 $breakTime = $breakInTime && $breakOutTime ? $breakInTime->diff($breakOutTime)->format('%H:%I:%S') : '00:00:00';
    //                 $workingHours = $this->subtractTime($workingHours, $breakTime);
    //             }
    
    //             // Update total working hours for the user
    //             if (!isset($userTotalHours[$entry->user_id])) {
    //                 $userTotalHours[$entry->user_id] = '00:00:00';
    //             }
    //             $userTotalHours[$entry->user_id] = $this->addTime($userTotalHours[$entry->user_id], $workingHours);
    //         }
    //     }
    
    //     // Prepare the filtered data for Blade.php
    //     $filteredData = collect($userTotalHours)->map(function ($totalHours, $userId) {
    //         $user = User::find($userId); // Assuming User is the model for your users
    //         return [
    //             'user_name' => $user->name, // Adjust the attribute based on your user model
    //             'working_hours' => $totalHours,
    //         ];
    //     });
        
    //     return view('admin.monthlytimehistory', compact('filteredData'));
    // }

    // public function GetMonthlyHours(Request $request){
    //     $selectedDate = $request->input(now()->toDateString());
    
    //     // Convert the selected date to a Carbon instance
    //     $selectedDateCarbon = \Carbon\Carbon::parse($selectedDate);
    
    //     // Get the month from the selected date
    //     $month = $selectedDateCarbon->month;
    
    //     // If you need the month as a string (e.g., '01' for January)
    //     $monthString = $selectedDateCarbon->format('m');
    
    //     $filteredEntries = TimeTracker::whereMonth('date', $month)
    //         ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
    //         ->get();
    
    //     // Initialize an associative array to store total working hours for each user
    //     $userTotalHours = [];
    
    //     // Calculate the working hours minus break time for each entry
    //     foreach ($filteredEntries as $entry) {
    //         // Convert time strings to \DateTime objects
    //         $punchInTime = $entry->punch_in_time ? \DateTime::createFromFormat('H:i:s', $entry->punch_in_time) : null;
    //         $punchOutTime = $entry->punch_out_time ? \DateTime::createFromFormat('H:i:s', $entry->punch_out_time) : null;
    
    //         // Calculate the time difference for each pair of punch in and punch out
    //         if ($punchInTime && $punchOutTime) {
    //             $workingHours = $punchInTime->diff($punchOutTime)->format('%H:%I:%S');
                
    //             // Subtract break time if available
    //             if ($entry->break_in_time && $entry->break_out_time) {
    //                 $breakInTime = \DateTime::createFromFormat('H:i:s', $entry->break_in_time);
    //                 $breakOutTime = \DateTime::createFromFormat('H:i:s', $entry->break_out_time);
    //                 $breakTime = $breakInTime && $breakOutTime ? $breakInTime->diff($breakOutTime)->format('%H:%I:%S') : '00:00:00';
    //                 $workingHours = $this->subtractTime($workingHours, $breakTime);
    //             }
    
    //             // Update total working hours for the user
    //             if (!isset($userTotalHours[$entry->user_id])) {
    //                 $userTotalHours[$entry->user_id] = '00:00:00';
    //             }
    //             $userTotalHours[$entry->user_id] = $this->addTime($userTotalHours[$entry->user_id], $workingHours);
    //         }
    //     }
    
    //     // Prepare the filtered data for Blade.php
    //     $filteredData = collect($userTotalHours)->map(function ($totalHours, $userId) {
    //         $user = User::find($userId); // Assuming User is the model for your users
    //         return [
    //             'user_name' => $user->name, // Adjust the attribute based on your user model
    //             'working_hours' => $totalHours,
    //         ];
    //     });
    
    //     dd($filteredData); // Debugging line to inspect $filteredData
        
    //     // return view('admin.monthlytimehistory', compact('filteredData'));
    // }

    public function GetMonthlyHours(Request $request){
        $selectedDate = $request->input(now()->toDateString());
    
        // Convert the selected date to a Carbon instance
        $selectedDateCarbon = Carbon::parse($selectedDate);
    
        // Get the month from the selected date
        $month = $selectedDateCarbon->month;
    
        $filteredEntries = DB::table('time_trackers')
            ->selectRaw('user_id, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(
                punch_out_time,
                punch_in_time
            )))) as total_working_hours, 
            SEC_TO_TIME(SUM(IFNULL(TIME_TO_SEC(TIMEDIFF(
                break_out_time,
                break_in_time
            )), 0))) as total_break_time')
            ->whereMonth('date', $month)
            ->groupBy('user_id')
            ->get();
    
        // Calculate the net working hours (working hours - break time)
        $filteredEntries->transform(function ($entry) {
            $entry->total_time = Carbon::createFromTime(0)->addSeconds(
                strtotime($entry->total_working_hours) - strtotime($entry->total_break_time)
            )->format('H:i:s');
            return $entry;
        });
    
        // Prepare the filtered data for Blade.php
        $filteredData = $filteredEntries->map(function ($entry) {
            return [
                'user_name' => User::find($entry->user_id)->name,
                'working_hours' => $entry->total_time,
            ];
        });
    
        // dd($filteredData); // Debugging line to inspect $filteredData
         return view('admin.monthlytimehistory', compact('filteredData'));
    }    
    
    
    // Helper function to add time
    private function addTime($time1, $time2) {
        $start = new \DateTime("1970-01-01 00:00:00");
        $interval1 = \DateInterval::createFromDateString($time1);
        $interval2 = \DateInterval::createFromDateString($time2);
    
        // Add the intervals
        $start->add($interval1);
        $start->add($interval2);
    
        return $start->format('H:i:s');
    }
    
    // Helper function to subtract time
    private function subtractTime($time1, $time2) {
        $start = new \DateTime("1970-01-01 00:00:00");
        $interval1 = \DateInterval::createFromDateString($time1);
        $interval2 = \DateInterval::createFromDateString($time2);
    
        // Subtract the intervals
        $start->sub($interval2);
        $start->sub($interval1);
    
        return $start->format('H:i:s');
    }
    

}
