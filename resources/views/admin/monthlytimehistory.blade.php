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
                </div>
                @php
                var_dump($filteredData);
                    $filteredEntries = isset($filteredEntries)
                        ? $filteredEntries
                        : auth()
                            ->user()
                            ->definetimetracking->first();
                @endphp
                <div class="card-body">
                    <form class="filter-form" method="get" action="{{ route('filter-all-user-time-history') }}">
                        @csrf
                        <label for="selected_date">Select Date:</label>
                        <input type="date" id="selected_date" name="selected_date" required>


                        <button type="submit">Filter</button>
                    </form>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Total Working Hours</th>
                                <th>Total Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalHoursMonth = 0; ?>
                           

                                    @foreach ($filteredData as $data)
            <tr>
                <td>{{ $data['user_name'] }}</td>
                <td>{{ $data['working_hours'] }}</td>
            </tr>
        @endforeach

               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
