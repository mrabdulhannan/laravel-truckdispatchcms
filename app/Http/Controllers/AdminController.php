<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;
use App\Models\SalesDailyUpdate;

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

    public function GetMonthlyHours(Request $request){
        $timeEntries = $user->definetimetracking()
        ->whereMonth('date', $month)
        ->get();
    }


}
