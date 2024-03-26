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
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Enter Update for {{now()->format('Y-m-d')}}</h2>
                </div>
                <div class="card-body">
                    <div class="container mt-5 mb-5">
                        <form action="{{ route('salesdailyupdate') }}" method="POST">
                            @csrf
                            @php
                                $entry = auth()
                                    ->user()
                                    ->salesdailyupdate()
                                    ->where('date', now()->format('Y-m-d'))
                                    ->firstOrNew();
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{  now()->format('Y-m-d') }}" required readonly>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="sales">Total Number of Sales:</label>
                                        <input type="number" class="form-control" id="sales" name="sales" value="{{$entry->sales}}" min="0">
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="leads">Total Number of Leads:</label>
                                        <input type="number" class="form-control" id="leads" name="leads" value="{{$entry->leads}}" min="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="sign_up">Total No. of Sign Up (Truck Drivers):</label>
                                        <input type="number" class="form-control" id="sign_up" name="sign_up" value="{{$entry->no_truck_drivers}}" min="0">
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="updates">Today's Updates:</label>
                                        <textarea class="form-control" id="updates" name="updates" rows="4" value="">{{$entry->updates}}</textarea>
                                    </div>
                                    <div style="text-align: right" class="mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                    
                            
                        </form>
                    </div>
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
                            @foreach (Auth::user()->salesdailyupdate as $entry)
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
