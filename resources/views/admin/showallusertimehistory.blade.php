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
@endpush


@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Time History for All Users</h2>
                    <form method="get" action="{{ route('filter-all-user-time-history') }}" class="mt-4">
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
                                <label for="assigned_to" class="text-lg font-semibold">Assigned To:</label>
                                <select name="assigned_to" id="assigned_to" class="form-select">
                                    <option value="">Select User</option> <!-- Empty default option -->
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                     
                        
                        
                            <!-- Add space here -->
                        
                            <!-- Filter button -->
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        
                    </form>
                </div>
                @php
                    $filteredEntries = isset($filteredEntries)
                        ? $filteredEntries
                        : auth()
                            ->user()
                            ->definetimetracking->first();
                @endphp
                <div class="card-body">
                    {{-- <form class="filter-form" method="get" action="{{ route('filter-all-user-time-history') }}">
                        @csrf
                        <label for="selected_date">Select Date:</label>
                        <input type="date" id="selected_date" name="selected_date" required>


                        <button type="submit">Filter</button>
                    </form> --}}
                    <form method="get" action="{{ route('filter-all-user-time-history') }}">
                        @csrf
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required>

                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required>

                        <button type="submit">Filter</button>
                    </form>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Punch-in Time</th>
                                <th>Break-in Time</th>
                                <th>Break-out Time</th>
                                <th>Punch-out Time</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                                <th>Total Hours</th>
                                <th>Total Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filteredEntries as $entry)
                            @php
                            $salary_hour = \App\Models\User::find($entry->user_id)->salary_hour;
                            @endphp
                                <tr>
                                    <td>{{ $entry->user->name }}</td>
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->punch_in_time }}</td>
                                    <td>{{ $entry->break_in_time }}</td>
                                    <td>{{ $entry->break_out_time }}</td>
                                    <td>{{ $entry->punch_out_time }}</td>
                                    <td>{{ $entry->login_time }}</td>
                                    <td>{{ $entry->logout_time }}</td>
                                    @php
                                        // Initialize variables to handle null or empty times
                                        $punchIn = $entry->punch_in_time ? \Carbon\Carbon::createFromFormat('H:i:s', $entry->punch_in_time) : null;
                                        $breakIn = $entry->break_in_time ? \Carbon\Carbon::createFromFormat('H:i:s', $entry->break_in_time) : null;
                                        $punchOut = $entry->punch_out_time ? \Carbon\Carbon::createFromFormat('H:i:s', $entry->punch_out_time) : null;
                                        $breakOut = $entry->break_out_time ? \Carbon\Carbon::createFromFormat('H:i:s', $entry->break_out_time) : null;

                                        // Check if necessary times are available before calculating
                                        if ($punchIn && $breakIn && $punchOut && $breakOut) {
                                            $totalWorked = $punchOut->diffInMinutes($breakIn) + $punchOut->diffInMinutes($breakOut);
                                            $totalHours = $totalWorked / 60; // Convert minutes to hours
                                        } else {
                                            $totalHours = 0; // Set to 0 if any required time is missing
                                        }

                                        // Calculate total salary (replace this with your specific logic)
                                        $totalSalary = $totalHours * $salary_hour;
                                    @endphp

                                    <td>{{ number_format($totalHours, 2) }}</td>
                                    <td>{{ number_format($totalSalary, 2) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
