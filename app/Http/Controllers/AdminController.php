<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;
use App\Models\SalesDailyUpdate;
use App\Models\Carrier;

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
        // $selected_date = $request->input('selected_date');
        
        // $filteredEntries = TimeTracker::whereDate('date', $selected_date)
        //     ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
        //     ->get();
        
        // return view('admin.showallusertimehistory', compact('filteredEntries'));
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $filteredEntries = TimeTracker::whereBetween('date', [$startDate, $endDate])
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
        // $selected_date = $request->input('selected_date');
        
        // $filteredEntries = SalesDailyUpdate::whereDate('date', $selected_date)
        //     ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
        //     ->get();
        
        // return view('admin.updatesforallsales', compact('filteredEntries'));
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $filteredEntries = SalesDailyUpdate::whereBetween('date', [$startDate, $endDate])
            ->with('user') // Assuming there is a 'user' relationship in your SalesDailyUpdate model
            ->get();
        
        return view('admin.updatesforallsales', compact('filteredEntries'));
    }

    public function showcarrieradmin()
    {
        $carrier = Carrier::all();
        $users = User::all();
    
        return view('admin/showcarrieradmin',compact('carrier', 'users') );
    }

    public function FilterCarrierHistoryAdmin(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $users = User::all();

        $filteredCarriers = auth()
            ->user()
            ->definecarrier()
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        return view('admin/showcarrieradmin', compact('filteredCarriers', 'users'));
    }

    public function updateCarrierAssignedUser(Request $request, $carrierId)
    {
        $assignedTo = $request->input('assigned_to');
        $carrier = Carrier::findOrFail($carrierId);
        $carrier->assigned_to = $request->input('assigned_to');
        $carrier->save();
        return redirect()->back()->with('success', 'Carrier updated successfully');
    }

}
