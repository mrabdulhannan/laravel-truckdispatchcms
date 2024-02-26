@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title m-0">All Loads</h2>
                        <div class="d-flex justify-content-between align-items-center">

                            <form method="get" action="{{ route('filter-load-history-admin') }}" class="mt-4">
                                @csrf
                                <div class="d-flex flex-wrap align-items-center">
                                    <!-- Start Date input -->
                                    <div class="form-group mb-3 me-3">
                                        <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                                        <input type="date" id="start_date" name="start_date" class="form-control">
                                    </div>
    
                                    <!-- Add space here -->
    
                                    <!-- End Date input -->
                                    <div class="form-group mb-3 me-3">
                                        <label for="end_date" class="text-lg font-semibold">End Date:</label>
                                        <input type="date" id="end_date" name="end_date" class="form-control">
                                    </div>
    
                                    <!-- Add space here -->
    
                                    <!-- Assigned To select -->
                                    <div class="form-group mb-3 me-3">
                                        <label for="added_by" class="text-lg font-semibold">Added by:</label>
                                        <select name="added_by" id="added_by" class="form-select">
                                            <option value="">Select Added by</option> <!-- Empty default option -->
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                    <!-- Filter button -->
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
    
                            </form>
    
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Check if loads are empty -->
                        @if ($loads->isEmpty())
                            <p>No loads found.</p>
                        @else
                            <!-- List of loads -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Load</th>
                                            <th>Added By</th>
                                            <th>Carrier</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Broker</th>
                                            <th>Trip</th>
                                            <th>Amount</th>
                                            <th>Pickup Date</th>
                                            <th>Origin Del Date</th>
                                            <th>Destination</th>
                                            <th>Job Status</th>
                                            <th>Rate Per Mile</th>
                                            <th>Agreement</th>
                                            <th>Dispatcher</th>
                                            <th>Profit</th>
                                            <th>Paid</th>
                                            <th>Remaining Balance</th>
                                            <th>Invoice Status</th>
                                            <th>Sr No</th>
                                            <th>Agent Name</th>
                                            <th>Company Name</th>
                                            <th>MC</th>
                                            <th>Driver's Truck</th>
                                            <th>Truck's State</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loads as $load)
                                            <tr>
                                                <td>{{ $load->load }}</td>
                                                <td>{{ $load->user->name }}</td>
                                                <td>{{ $load->carrier }}</td>
                                                <td>{{ $load->name }}</td>
                                                <td>{{ $load->date }}</td>
                                                <td>{{ $load->broker }}</td>
                                                <td>{{ $load->trip }}</td>
                                                <td>{{ $load->amount }}</td>
                                                <td>{{ $load->pudate }}</td>
                                                <td>{{ $load->origindeldate }}</td>
                                                <td>{{ $load->destination }}</td>
                                                <td>{{ $load->jobstatus }}</td>
                                                <td>{{ $load->ratepermile }}</td>
                                                <td>{{ $load->agreement }}</td>
                                                <td>{{ $load->dispatcher }}</td>
                                                <td>{{ $load->profit }}</td>
                                                <td>{{ $load->paid }}</td>
                                                <td>{{ $load->remainingbalance }}</td>
                                                <td>{{ $load->invoicestatus }}</td>
                                                <td>{{ $load->srno }}</td>
                                                <td>{{ $load->agentname }}</td>
                                                <td>{{ $load->companyname }}</td>
                                                <td>{{ $load->mc }}</td>
                                                <td>{{ $load->driverstruck }}</td>
                                                <td>{{ $load->trucksstate }}</td>
                                                <td>{{ $load->contact }}</td>
                                                <td>{{ $load->status }}</td>
                                                <td>
                                                    <!-- Edit Load button -->
                                                    <a href="{{ route('editload', ['id' => $load->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <!-- Delete Load button -->
                                                    <form action="{{ route('deleteload', ['id' => $load->id]) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this load?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <!-- Display totals -->
                    <div class="card-footer">
                        <strong>Total Amount:</strong> ${{ $totalAmount }}<br>
                        <strong>Total Paid:</strong> ${{ $totalPaid }}<br>
                        <strong>Total Remaining Balance:</strong> ${{ $totalRemainingBalance }}<br>
                        <strong>Total Profit:</strong> ${{ $totalProfit }}<br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
