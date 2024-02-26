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
                    <h2 class="card-title">Time History</h2>
                    <form method="get" action="{{ route('filter-time-history') }}">
                        @csrf
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required>

                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required>

                        <button type="submit">Filter</button>
                    </form>
                </div>
                {{-- <div class="card-header">
                    <h2 class="card-title">Time History for Month {{ now()->format('F') }}</h2>
                </div> --}}
                <div class="card-body">
                    <div class="">
                        {{-- @php
                            $allentries = auth()
                                ->user()
                                ->definetimetracking();
                        @endphp --}}
                        @php
                            $filteredEntries = isset($filteredEntries) ? $filteredEntries : auth()->user()->definetimetracking;
                        @endphp

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

                                <?php
                                // if($filteredEntries->count >=1){
                                //     $allentries = $filteredEntries;
                                // }
                                // else{
                                //     $allentries = Auth::user()->definetimetracking;
                                // }
                                    

                                    if ($filteredEntries->count() === 1) {
                                        // If there is only one record, retrieve the first record
                                        $singleEntry = $filteredEntries->first();
                                ?>
                                <tr>
                                    <td>{{ optional($singleEntry->date)->format('Y-m-d') }}</td>
                                    <td>{{ $singleEntry->punch_in_time }}</td>
                                    <td>{{ $singleEntry->break_in_time }}</td>
                                    <td>{{ $singleEntry->break_out_time }}</td>
                                    <td>{{ $singleEntry->punch_out_time }}</td>
                                    <td>{{ $singleEntry->login_time }}</td>
                                    <td>{{ $singleEntry->logout_time }}</td>
                                </tr>
                                <?php
                                } else {
                                    // If there are multiple records, loop through all records
                                    foreach ($filteredEntries as $key => $singleEntry) {
                                ?>
                                <tr>
                                    <td>{{ optional($singleEntry->date)->format('Y-m-d') }}</td>
                                    <td>{{ $singleEntry->punch_in_time }}</td>
                                    <td>{{ $singleEntry->break_in_time }}</td>
                                    <td>{{ $singleEntry->break_out_time }}</td>
                                    <td>{{ $singleEntry->punch_out_time }}</td>
                                    <td>{{ $singleEntry->login_time }}</td>
                                    <td>{{ $singleEntry->logout_time }}</td>
                                </tr>
                                <?php
                                }   
                    }
                    ?>


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
