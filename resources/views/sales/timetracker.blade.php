@extends('layouts.app')

@push('stylesheet-page-level')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    {{-- <style>
      table {
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style> --}}
@endpush
@section('content')
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Enter Time for {{ now()->format('Y-m-d') }}</h2>
                </div>
                <div class="card-body">
                    <div class="">
                        {{-- <h2>Enter Time Tracking and Login History</h2> --}}

                        <form id="trackingForm" action="{{ route('savetimetracking') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @php
                                $entry = auth()
                                    ->user()
                                    ->definetimetracking()
                                    ->where('date', now()->format('Y-m-d'))
                                    ->firstOrNew();
                            @endphp
                            <table>
                                <tr>
                                    <th>Date</th>
                                    <th>Punch-in Time</th>
                                    <th>Break-in Time</th>
                                    <th>Break-out Time</th>
                                    <th>Punch-out Time</th>
                                    {{-- <th>Login Time</th>
                                    <th>Logout Time</th> --}}

                                </tr>
                                <tr>

                                    <td><input type="text" id="date" name="date" placeholder="YYYY-MM-DD"
                                            value="{{ now()->format('Y-m-d') }}"></td>
                                    {{-- <td><input type="time" id="punchInTime" name="punchInTime"
                                            value="{{ $entry->punch_in_time }}" min="16:00" max="04:00"></td>
                                    <td><input type="time" id="breakInTime" name="breakInTime"
                                            value="{{ $entry->break_in_time }}" min="16:00" max="04:00"></td>
                                    <td><input type="time" id="breakOutTime" name="breakOutTime"
                                            value="{{ $entry->break_out_time }}" min="16:00" max="04:00"></td>
                                    <td><input type="time" id="punchOutTime" name="punchOutTime"
                                            value="{{ $entry->punch_out_time }}" min="16:00" max="04:00"></td> --}}


                                            <td><input type="time" id="punchInTime" name="punchInTime"
                                                value="{{ date('H:i', strtotime($entry->punch_in_time)) }}" min="16:00" max="04:00"></td>
                                     <td><input type="time" id="breakInTime" name="breakInTime"
                                                value="{{ date('H:i', strtotime($entry->break_in_time)) }}" min="16:00" max="04:00"></td>
                                     <td><input type="time" id="breakOutTime" name="breakOutTime"
                                                value="{{ date('H:i', strtotime($entry->break_out_time)) }}" min="16:00" max="04:00"></td>
                                     <td><input type="time" id="punchOutTime" name="punchOutTime"
                                                value="{{ date('H:i', strtotime($entry->punch_out_time)) }}" min="16:00" max="04:00"></td>
                                     

                                    {{-- <td><input type="time" id="punchInTime" name="punchInTime"
                                            value="{{ $entry->punch_in_time }}"></td>
                                    <td><input type="time" id="breakInTime" name="breakInTime"
                                            value="{{ $entry->break_in_time }}"></td>
                                    <td><input type="time" id="breakOutTime" name="breakOutTime"
                                            value="{{ $entry->break_out_time }}"></td>
                                    <td><input type="time" id="punchOutTime" name="punchOutTime"
                                            value="{{ $entry->punch_out_time }}"></td> --}}
                                    <input type="time" id="loginTime" name="loginTime" value="{{ $entry->login_time }}"
                                        readonly hidden>
                                    <input type="time" id="logoutTime" name="logoutTime"
                                        value="{{ $entry->logout_time }}" readonly hidden>
                                </tr>

                            </table>

                            <div class="mt-3 mb-3 me-3" style="text-align: right">
                                <input type="submit" class="btn btn-success" value="Submit">

                            </div>
                        </form>
                        {{-- 
                        <div class="container mt-5 mb-5">
                            <form action="{{ route('savetimetracking') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Date:</label>
                                            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}" required readonly>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="sales">Total Number of Sales:</label>
                                            <input type="number" class="form-control" id="sales" name="sales" required>
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="leads">Total Number of Leads:</label>
                                            <input type="number" class="form-control" id="leads" name="leads" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="leads">Total No. of Sign Up (Truck Drivers):</label>
                                            <input type="number" class="form-control" id="leads" name="leads" required>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="updates">Today's Updates:</label>
                                            <textarea class="form-control" id="updates" name="updates" rows="4" required></textarea>
                                        </div>
                                        <div style="text-align: right" class="mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                        
                                
                            </form>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
    {{-- <script>
        document.getElementById("trackingForm").addEventListener("submit", function(event) {
            event.preventDefault();

            // Retrieve values from the form
            var date = document.getElementById("date").value;
            var punchInTime = document.getElementById("punchInTime").value;
            var breakInTime = document.getElementById("breakInTime").value;
            var breakOutTime = document.getElementById("breakOutTime").value;
            var punchOutTime = document.getElementById("punchOutTime").value;
            var loginTime = document.getElementById("loginTime").value;
            var logoutTime = document.getElementById("logoutTime").value;

            // Perform actions with the collected data (e.g., store in a database, display, etc.)
            console.log("Date:", date);
            console.log("Punch-in Time:", punchInTime);
            console.log("Break-in Time:", breakInTime);
            console.log("Break-out Time:", breakOutTime);
            console.log("Punch-out Time:", punchOutTime);
            console.log("Login Time:", loginTime);
            console.log("Logout Time:", logoutTime);
        });
    </script> --}}
@endpush
