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
                    <h2 class="card-title">Enter Time </h2>
                </div>
                <div class="card-body">
                    <div class="">
                        {{-- <h2>Enter Time Tracking and Login History</h2> --}}

                        <form id="trackingForm"  action="{{ route('savetimetracking') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <table>
                                <tr>
                                    <th>Date</th>
                                    <th>Punch-in Time</th>
                                    <th>Break-in Time</th>
                                    <th>Break-out Time</th>
                                    <th>Punch-out Time</th>
                                    <th>Login Time</th>
                                    <th>Logout Time</th>

                                </tr>
                                <tr>

                                        <td><input type="text" id="date" name="date" placeholder="YYYY-MM-DD"  value="{{ now()->format('Y-m-d') }}"></td>
                                        <td><input type="time" id="punchInTime" name="punchInTime" ></td>
                                        <td><input type="time" id="breakInTime" name="breakInTime" ></td>
                                        <td><input type="time" id="breakOutTime" name="breakOutTime" ></td>
                                        <td><input type="time" id="punchOutTime" name="punchOutTime" ></td>
                                        <td><input type="time" id="loginTime" name="loginTime" ></td>
                                        <td><input type="time" id="logoutTime" name="logoutTime" ></td>
                                </tr>
                                
                            </table>
                    
                            <div class="mt-3 mb-3 me-3" style="text-align: right">
                                <input type="submit" class="btn btn-success" value="Submit">

                            </div>
                        </form>
                    </div>
                    <div class="">
                        <h2>Time Tracking and Login History</h2>

                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Punch-in Time</th>
                                    <th>Break-in Time</th>
                                    <th>Break-out Time</th>
                                    <th>Punch-out Time</th>
                                    <th>Login Time</th>
                                    <th>Logout Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data (Replace this with your actual data) -->
                                <tr>
                                    <td>2024-01-11</td>
                                    <td>08:00 AM</td>
                                    <td>12:00 PM</td>
                                    <td>01:00 PM</td>
                                    <td>05:00 PM</td>
                                    <td>09:00 AM</td>
                                    <td>06:00 PM</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
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
