<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Load;

class DispatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('sales');
    }

    public function createload()
    {
        return view('dispatch.createload');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $currentDate = now(); // Get the current date and time

        $user = auth()->user(); // Assuming you are using authentication

        $data = $request->validate([
            'load' => 'nullable|string',
            'carrier' => 'nullable|string',
            'name' => 'nullable|string',
            'date' => 'nullable|date',
            'broker' => 'nullable|string',
            'trip' => 'nullable|string',
            'amount' => 'nullable|string',
            'pudate' => 'nullable|date',
            'origindeldate' => 'nullable|date',
            'destination' => 'nullable|string',
            'jobstatus' => 'nullable|string',
            'ratepermile' => 'nullable|string',
            'agreement' => 'nullable|string',
            'dispatcher' => 'nullable|string',
            'profit' => 'nullable|string',
            'paid' => 'nullable|string',
            'remainingbalance' => 'nullable|string',
            'invoicestatus' => 'nullable|string',
            'srno' => 'nullable|string',
            'agentname' => 'nullable|string',
            'companyname' => 'nullable|string',
            'mc' => 'nullable|string',
            'driverstruck' => 'nullable|string',
            'trucksstate' => 'nullable|string',
            'name' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        // Use the load relationship to create a related load record
        $user->defineload()->create([
            'load' => $data['load'],
            'carrier' => $data['carrier'],
            'name' => $data['name'],
            'date' => $data['date'],
            'broker' => $data['broker'],
            'trip' => $data['trip'],
            'amount' => $data['amount'],
            'pudate' => $data['pudate'],
            'origindeldate' => $data['origindeldate'],
            'destination' => $data['destination'],
            'jobstatus' => $data['jobstatus'],
            'ratepermile' => $data['ratepermile'],
            'agreement' => $data['agreement'],
            'dispatcher' => $data['dispatcher'],
            'profit' => $data['profit'],
            'paid' => $data['paid'],
            'remainingbalance' => $data['remainingbalance'],
            'invoicestatus' => $data['invoicestatus'],
            'srno' => $data['srno'],
            'agentname' => $data['agentname'],
            'companyname' => $data['companyname'],
            'mc' => $data['mc'],
            'driverstruck' => $data['driverstruck'],
            'trucksstate' => $data['trucksstate'],
            'name' => $data['name'],
            'contact' => $data['contact'],
            'date' => $currentDate,
        ]);

        // You can add any additional logic or redirection here
        return redirect()->route('createload');
    }

    public function showload()
    {
        return view('dispatch/showload');
    }


    public function editload($id)
    {
        $load = Load::findOrFail($id);

        return view('dispatch/editload', ['load' => $load]);
    }

    public function deleteload($id)
    {
        // Find the category by ID and delete it
        $load = Load::findOrFail($id);
        $load->delete();

        return redirect()->route('showload')->with('success', 'Load deleted successfully');
    }
}
