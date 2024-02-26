@extends('layouts.app')

@push('stylesheet-page-level')
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
                                        <input type="number" class="form-control" id="sales" name="sales" value="{{$entry->sales}}">
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="leads">Total Number of Leads:</label>
                                        <input type="number" class="form-control" id="leads" name="leads" value="{{$entry->leads}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sign_up">Total No. of Sign Up (Truck Drivers):</label>
                                        <input type="number" class="form-control" id="sign_up" name="sign_up" value="{{$entry->no_truck_drivers}}">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
@endpush
