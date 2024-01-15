<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;

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
}
