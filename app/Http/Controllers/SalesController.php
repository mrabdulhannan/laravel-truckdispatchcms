<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrier;

class SalesController extends Controller
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

    public function create()
    {
        return view('sales.createcarrier');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $currentDate = date('Y-m-d');

        // Create a new carrier record for the authenticated user
        $user->definecarrier()->create([
            'companyName' => $request['companyName'],
            'dba' => $request['dba'],
            'address' => $request['address'],
            'streetAddress' => $request['streetAddress'],
            'city' => $request['city'],
            'state' => $request['state'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'dob' => $request['dob'],
            'mcNumber' => $request['mcNumber'],
            'usdot' => $request['usdot'],
            'numTrucks' => $request['numTrucks'],
            'numDrivers' => $request['numDrivers'],
            'equipmentType' => $request['equipmentType'],
            'PaymentMethod' => $request['PaymentMethod'],
            'Route' => $request['Route'],
            'preferredStates' => $request['preferredStates'],

            // Map other form fields accordingly
        ]);

        return redirect('/createcarrier');
    }

    public function showcarrier()
    {
        return view('sales/showcarrier');
    }

    public function editcarrier($id)
    {
        $carrier = Carrier::findOrFail($id);

        return view('sales/editcarrier', ['carrier' => $carrier]);
    }


    public function updateCarrier(Request $request, $carrierId)
    {
        // Validate the incoming request data as needed
        $request->validate([
            'companyName' => 'required|string',
            'dba' => 'nullable|string',
            'address' => 'required|string',
            'streetAddress' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'dob' => 'required|date_format:Y-m-d',
            'mcNumber' => 'required|string',
            'usdot' => 'required|string',
            'numTrucks' => 'required|integer',
            'numDrivers' => 'required|integer',
            'equipmentType' => 'required|string',
            'PaymentMethod' => 'required|string',
            'Route' => 'required|string',
            'preferredStates' => 'nullable|string',
            'mcAuthorityLetter' => 'nullable|mimes:pdf,doc,docx',
            'certificateOfLiability' => 'nullable|mimes:pdf,doc,docx',
            'w9Form' => 'nullable|mimes:pdf,doc,docx',
            'voidCheque' => 'nullable|mimes:pdf,doc,docx',
        ]);

        // Find the carrier by ID
        $carrier = Carrier::findOrFail($carrierId);


        // Update the carrier attributes if the corresponding input exists in the request
        $carrier->companyName = $request->input('companyName');
        $carrier->dba = $request->input('dba');
        $carrier->address = $request->input('address');
        $carrier->streetAddress = $request->input('streetAddress');
        $carrier->city = $request->input('city');
        $carrier->state = $request->input('state');
        $carrier->email = $request->input('email');
        $carrier->phone = $request->input('phone');
        $carrier->dob = $request->input('dob');
        $carrier->mcNumber = $request->input('mcNumber');
        $carrier->usdot = $request->input('usdot');
        $carrier->numTrucks = $request->input('numTrucks');
        $carrier->numDrivers = $request->input('numDrivers');
        $carrier->equipmentType = $request->input('equipmentType');
        $carrier->PaymentMethod = $request->input('PaymentMethod');
        $carrier->Route = $request->input('Route');
        $carrier->preferredStates = $request->input('preferredStates');

        // Update or handle file uploads
        if ($request->hasFile('mcAuthorityLetter')) {
            $carrier->mcAuthorityLetter = $request->file('mcAuthorityLetter')->store('uploads');
        }

        if ($request->hasFile('certificateOfLiability')) {
            $carrier->certificateOfLiability = $request->file('certificateOfLiability')->store('uploads');
        }

        if ($request->hasFile('w9Form')) {
            $carrier->w9Form = $request->file('w9Form')->store('uploads');
        }

        if ($request->hasFile('voidCheque')) {
            $carrier->voidCheque = $request->file('voidCheque')->store('uploads');
        }

        $carrier->save();

        // Redirect back or to a specific route after updating
        return redirect()->back()->with('success', 'Carrier updated successfully');
    }

    public function deleteCarrier($id)
    {
        // Find the category by ID and delete it
        $carrier = Carrier::findOrFail($id);
        $carrier->delete();

        return redirect()->route('showcarrier')->with('success', 'Carrier deleted successfully');
    }

    public function createdailyupdate()
    {
        return view('sales.dailyupdate');
    }


    public function salesdailyupdate(Request $request)
    {
        // dd($request->all());
        $date = $request['date'];
        $sales = $request['sales'];
        $leads = $request['leads'];
        $sign_up = $request['sign_up'];
        $updates = $request['updates'];

        $entry = auth()->user()->salesdailyupdate()->where('date', $date)->firstOrNew();
        $user = auth()->user();
        if (!$entry->exists) {
            $user->salesdailyupdate()->create([
                "date" => $date,
                "updates" => $updates,
                "sales" => $sales,
                "no_truck_drivers" => $sign_up,
                "leads" => $leads,
            ]);
        } else {
            $user->salesdailyupdate()->update([
                "date" => $date,
                "updates" => $updates,
                "sales" => $sales,
                "no_truck_drivers" => $sign_up,
                "leads" => $leads,
            ]);
        }
        return redirect()->route('createdailyupdate')->with('success', 'Time Updated successfully');
    }

    public function FilterCarrierHistory(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $filteredCarriers = auth()
            ->user()
            ->definecarrier()
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        return view('sales.showcarrier', compact('filteredCarriers'));
    }

    // public function FilterCarrierHistory(Request $request)
    // {
    //     dd($request->all());
    //     // Retrieve input values
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');
    //     $assigned_to = $request->input('assigned_to');
    //     $status = $request->input('status');
    //     $approved = $request->input('approved');
    //     $assigned = $request->input('assigned');

    //     // Start building the query
    //     $query = auth()->user()->definecarrier();

    //     // Apply filters if they are provided
    //     if (!empty($start_date) && !empty($end_date)) {
    //         $query->whereBetween('created_at', [$start_date, $end_date]);
    //     }
    //     if (!empty($assigned_to)) {
    //         $query->where('assigned_to', $assigned_to);
    //     }
    //     if (!empty($status)) {
    //         $query->where('status', $status);
    //     }
    //     if (!is_null($approved)) {
    //         $query->where('approved', $approved);
    //     }
    //     if (!is_null($assigned)) {
    //         $query->where('assigned', $assigned);
    //     }

    //     // Execute the query
    //     $filteredCarriers = $query->get();

    //     return view('sales.showcarrier', compact('filteredCarriers'));
    // }
}
