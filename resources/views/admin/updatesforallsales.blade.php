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
                    <h2 class="card-title">Updates History for All Sales Users</h2>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('filterupdateforallsales') }}">
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
                                <th>Total Number of Sales</th>
                                <th>Total Number of Leads</th>
                                <th>Total No. of Sign Up (Truck Drivers)</th>
                                <th>Day's Updates</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filteredEntries as $entry)
                                <tr>
                                    <td>{{ $entry->user->name }}</td>
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->sales }}</td>
                                    <td>{{ $entry->leads }}</td>
                                    <td>{{ $entry->no_truck_drivers }}</td>
                                    <td>{{ $entry->updates }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
@endpush
