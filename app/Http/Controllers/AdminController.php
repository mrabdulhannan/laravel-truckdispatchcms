<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TimeTracker;
use App\Models\SalesDailyUpdate;
use App\Models\Carrier;
use App\Models\Load;
use App\Models\Notes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function showallusertimehistory(Request $request)
    {
        $users = User::all();
        // $filteredEntries = TimeTracker::all();
        $selected_date = $request->input('selected_date', now()->toDateString());

        $filteredEntries = TimeTracker::whereDate('date', $selected_date)
            ->with('user')
            ->get();

        return view('admin.showallusertimehistory', compact('filteredEntries','users'));
    }

    public function TimeHistoryForAllUsers(Request $request)
    {
        // $selected_date = $request->input('selected_date');

        // $filteredEntries = TimeTracker::whereDate('date', $selected_date)
        //     ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
        //     ->get();

        // return view('admin.showallusertimehistory', compact('filteredEntries'));
        ///Old working Code:
        // $startDate = $request->input('start_date');
        // $endDate = $request->input('end_date');

        // $filteredEntries = TimeTracker::whereBetween('date', [$startDate, $endDate])
        //     ->with('user') // Assuming there is a 'user' relationship in your TimeTracker model
        //     ->get();

        // return view('admin.showallusertimehistory', compact('filteredEntries'));

        //New Code
        $users = User::all();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $assignedTo = $request->input('assigned_to');
    
        $query = TimeTracker::query();
    
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        if ($assignedTo) {
            $query->where('user_id', $assignedTo);
        }
    
        $filteredEntries = $query->with('user')->get();
    
        return view('admin.showallusertimehistory', compact('filteredEntries', 'users'));
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

    public function showallusers(Request $request)
    {

        $users = User::all();
        // $selected_date = $request->input('selected_date', now()->toDateString());

        // $filteredEntries = TimeTracker::whereDate('date', $selected_date)
        //     ->with('user')
        //     ->get();

        return view('admin.showallusers', compact('users'));
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);

        return view('admin/edituser', ['user' => $user]);
    }

    public function deleteuser($id)
    {
        // Find the category by ID and delete it
        $load = User::findOrFail($id);
        $load->delete();

        return redirect()->route('showallusers')->with('success', 'Load deleted successfully');
    }

    public function updateuseradmin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate request data
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'user_type' => 'required|string|in:admin,sales,dispatch',
            'salary_hour' => 'required|numeric',
        ];

        // Add password validation rule if provided
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8';
        }

        $request->validate($rules);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->salary_hour = $request->salary_hour;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('showallusers')->with('success', 'User updated successfully!');
    }

    public function createuser(){
        return view('admin/createuser');
    }

    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_type' => 'required|string|in:admin,sales,dispatch',
            'salary_hour' => 'required|numeric',
        ]);

        // Create the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->salary_hour = $request->salary_hour;
        $user->save();

        return redirect()->route('showallusers')->with('success', 'User created successfully!');
    }


    public function createnote(){
        $users = User::all();
        return view('admin/createnote', ['users' => $users]);
    }

    public function storenote(Request $request)
    {

        // dd($request->all());
        $user = Auth::user();
        // Create the user
        $note = new Notes();
        $note->comment = $request->comment;
        $note->user_id = $user->id;
        $note->assigned_to = $request->user_id;
        $note->save();

        return redirect()->route('createnote')->with('success', 'User created successfully!');
    }


    public function showallnotes(Request $request)
    {

        $notes = Notes::all();
        // $selected_date = $request->input('selected_date', now()->toDateString());

        // $filteredEntries = TimeTracker::whereDate('date', $selected_date)
        //     ->with('user')
        //     ->get();

        return view('admin.showallnotes', compact('notes'));
    }

    public function deletenote($id)
    {
        // Find the category by ID and delete it
        $note = Notes::findOrFail($id);
        $note->delete();

        return redirect()->route('showallnotes')->with('success', 'Note deleted successfully');
    }

    public function editnote($id)
    {
        $note = Notes::findOrFail($id);
        $users = User::all();

        return view('admin/editnote', ['note' => $note, 'users'=>$users]);
    }


    public function showondashboard(){
        $user = auth()->user();
        $assignedNotes = Notes::where('assigned_to', $user->id)->get()??[];
        return view('dispatch/dashboard',compact('assignedNotes'));
    }

    public function admindashboard(){
        $user = auth()->user();
        $assignedNotes = Notes::where('assigned_to', $user->id)->get()??[];
        return view('admin/dashboard',compact('assignedNotes'));
    }

    public function salesdashboard(){
        $user = auth()->user();
        $assignedNotes = Notes::where('assigned_to', $user->id)->get()??[];
        return view('sales/dashboard',compact('assignedNotes'));
    }

    public function qadashboard(){
        $user = auth()->user();
        $assignedNotes = Notes::where('assigned_to', $user->id)->get()??[];
        return view('home',compact('assignedNotes'));
    }
}
