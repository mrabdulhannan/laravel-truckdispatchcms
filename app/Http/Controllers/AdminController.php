<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;
use App\Models\SalesDailyUpdate;
use App\Models\Carrier;
use App\Models\Load;


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

    public function TimeHistoryForAllUsers(Request $request)
    {
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

    public function UpdateHistoryForAllSalesUsers(Request $request)
    {
        $selected_date = $request->input('selected_date', now()->toDateString());

        $filteredEntries = SalesDailyUpdate::whereDate('date', $selected_date)
            ->with('user')
            ->get();

        return view('admin.updatesforallsales', compact('filteredEntries'));
    }

    public function FilterUpdateHistoryForSalesUsers(Request $request)
    {
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
        // dd($carrier);
        $users = User::all();

        return view('admin/showcarrieradmin', compact('carrier', 'users'));
    }

    // public function FilterCarrierHistoryAdmin(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');
    //     $users = User::all();

    //     $filteredCarriers = auth()
    //         ->user()
    //         ->definecarrier()
    //         ->whereBetween('created_at', [$start_date, $end_date])
    //         ->get();

    //     return view('admin/showcarrieradmin', compact('filteredCarriers', 'users'));
    // }

    // public function updateCarrierAssignedUser(Request $request, $carrierId)
    // {
    //     $assignedTo = $request->input('assigned_to');
    //     $carrier = Carrier::findOrFail($carrierId);
    //     $carrier->assigned_to = $request->input('assigned_to');
    //     $carrier->save();
    //     return redirect()->back()->with('success', 'Carrier updated successfully');
    // }

    // public function updateCarrierAssignedUser(Request $request, $carrierId)
    // {
    //     $carrier = Carrier::findOrFail($carrierId);

    //     // Update assigned_to if it's present in the request
    //     if ($request->has('assigned_to')) {
    //         $carrier->assigned_to = $request->input('assigned_to');
    //     }

    //     // Update other fields (assuming 'status', 'approved', and 'assigned' are the other fields)
    //     $carrier->status = $request->input('status');
    //     $carrier->approved = $request->input('approved');
    //     $carrier->assigned = $request->input('assigned');

    //     // Save the changes
    //     $carrier->save();

    //     return redirect()->back()->with('success', 'Carrier updated successfully');
    // }

    public function updateCarrierAssignedUser(Request $request, $carrierId)
    {
        $carrier = Carrier::findOrFail($carrierId);

        // Check if at least one value is provided in the request
        if ($request->hasAny(['assigned_to', 'status', 'approved', 'assigned'])) {
            // Update assigned_to if it's present in the request
            if ($request->has('assigned_to')) {
                $carrier->assigned_to = $request->input('assigned_to');
            }

            // Update other fields if they are present in the request
            if ($request->has('status')) {
                $carrier->status = $request->input('status');
            }
            if ($request->has('approved')) {
                $carrier->approved = $request->input('approved');
            }
            if ($request->has('assigned')) {
                $carrier->assigned = $request->input('assigned');
            }

            // Save the changes
            $carrier->save();

            return redirect()->back()->with('success', 'Carrier updated successfully');
        } else {
            return redirect()->back()->with('error', 'No fields provided for update');
        }
    }



    public function FilterCarrierHistoryAdmin(Request $request)
    {
        // dd($request->all());
        $users = User::all();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $assigned_to = $request->input('assigned_to');
        $status = $request->input('status');
        $approved = $request->input('approved');
        $assigned = $request->input('assigned');

        // Start building the query
        $query = Carrier::query();

        // Apply filters if they are provided
        if (!empty($start_date) && !empty($end_date)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        if (!empty($assigned_to)) {
            $query->where('assigned_to', $assigned_to);
        }
        if (!empty($status)) {
            $query->where('status', $status);
        }
        if (!is_null($approved)) {
            $query->where('approved', $approved);
        }
        if (!is_null($assigned)) {
            $query->where('assigned', $assigned);
        }

        // Execute the query
        $carrier = $query->get();

        return view('admin/showcarrieradmin', compact('carrier', 'users'));
    }

    public function showloadadmin()
    {
        $loads = Load::all();
        // dd($carrier);
        $users = User::all();

        $totalAmount = $loads->sum('amount');
        $totalPaid = $loads->sum('paid');
        $totalRemainingBalance = $loads->sum('remainingbalance');
        $totalProfit = $loads->sum('profit');

        return view('admin/showloadadmin', compact('loads', 'users', 'totalAmount', 'totalPaid', 'totalRemainingBalance', 'totalProfit'));

        // return view('admin/showloadadmin', compact('loads', 'users'));
    }

    public function FilterLoadHistoryAdmin(Request $request)
    {
        // dd($request->all());
        $users = User::all();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $added_by = $request->input('added_by');
        // Start building the query
        $query = Load::query();

        // Apply filters if they are provided
        if (!empty($start_date) && !empty($end_date)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        if (!empty($added_by)) {
            $query->where('user_id', $added_by);
        }

        // Execute the query
        $loads = $query->get();

        $totalAmount = $loads->sum('amount');
        $totalPaid = $loads->sum('paid');
        $totalRemainingBalance = $loads->sum('remainingbalance');
        $totalProfit = $loads->sum('profit');

        return view('admin/showloadadmin', compact('loads', 'users', 'totalAmount', 'totalPaid', 'totalRemainingBalance', 'totalProfit'));
    }
}
