@extends('layouts.app')

@push('stylesheet-page-level')
    <!-- Add your custom stylesheets here -->
@endpush

@php
    $filteredCarriers = isset($carrier) ? $carrier : $carrier;
@endphp

@section('content')
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                {{-- <div class="card-header">
                    <div>
                        <h2 class="card-title">All Carrier</h2>
                        <!-- Filter form -->
                        <form method="get" action="{{ route('filter-carrier-history-admin') }}" class="flex flex-col space-y-4">
                            @csrf
                            <!-- First Row -->
                            <div class="d-flex flex-wrap space-x-4">
                                <!-- Start Date and End Date inputs -->
                                <div class="flex flex-col">
                                    <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" 
                                        class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                                </div>
                                <div class="flex flex-col">
                                    <label for="end_date" class="text-lg font-semibold">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" 
                                        class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                                </div>

                                <!-- Assigned To select -->
                                <div class="flex flex-col">
                                    <label for="assigned_to" class="text-lg font-semibold">Assigned To:</label>
                                    <div>
                                        <select name="assigned_to" id="assigned_to" class="form-select" aria-label="Select Assigned To">
                                            <option value="">Select Assigned To</option> <!-- Empty default option -->
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Second Row -->
                            <div class="d-flex flex-wrap space-x-4">
                                
                                <!-- Status select -->
                                <div class="flex flex-col">
                                    <label for="status" class="text-lg font-semibold">Status:</label>
                                    <select name="status" id="status" class="form-select" aria-label="Select Status">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <!-- Approved/Unapproved select -->
                                <div class="flex flex-col">
                                    <label for="approved" class="text-lg font-semibold">Approved/Unapproved:</label>
                                    <select name="approved" id="approved" class="form-select" aria-label="Select Approval Status">
                                        <option value="">Select Approval Status</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Unapproved</option>
                                    </select>
                                </div>
                                <!-- Assigned/Unassigned select -->
                                <div class="flex flex-col">
                                    <label for="assigned" class="text-lg font-semibold">Assigned/Unassigned:</label>
                                    <select name="assigned" id="assigned" class="form-select" aria-label="Select Assignment Status">
                                        <option value="">Select Assignment Status</option>
                                        <option value="1">Assigned</option>
                                        <option value="0">Unassigned</option>
                                    </select>
                                </div>
                                <button type="submit"
                                class="bg-blue-500 font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300">Filter</button>
                        
                            </div>
                            <!-- Filter button -->
                           </form>
                    </div>
                </div> --}}
                
                <div class="card-header">
                    <h2 class="card-title m-0">All Carrier</h2>
                </div>
                <div class="card-header">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Filter form -->
                        {{-- <form method="get" action="{{ route('filter-carrier-history-admin') }}"
                            class="">
                            @csrf
                            <div class="d-flex">
                                <!-- Start Date input -->
                                <div class="form-group mb-0 me-3">
                                    <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control">
                                </div>
                                <!-- End Date input -->
                                <div class="form-group mb-0 me-3">
                                    <label for="end_date" class="text-lg font-semibold">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control">
                                </div>
                                <!-- Assigned To select -->
                                <div class="form-group mb-0 me-3">
                                    <label for="assigned_to" class="text-lg font-semibold">Assigned To:</label>
                                    <select name="assigned_to" id="assigned_to" class="form-select">
                                        <option value="">Select Assigned To</option> <!-- Empty default option -->
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Status select -->
                                <div class="form-group mb-0 me-3">
                                    <label for="status" class="text-lg font-semibold">Status:</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <!-- Approved/Unapproved select -->
                                <div class="form-group mb-0 me-3">
                                    <label for="approved" class="text-lg font-semibold">Approved/Unapproved:</label>
                                    <select name="approved" id="approved" class="form-select">
                                        <option value="">Select Approval Status</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Unapproved</option>
                                    </select>
                                </div>
                                <!-- Assigned/Unassigned select -->
                                <div class="form-group mb-0 me-3">
                                    <label for="assigned" class="text-lg font-semibold">Assigned/Unassigned:</label>
                                    <select name="assigned" id="assigned" class="form-select">
                                        <option value="">Select Assignment Status</option>
                                        <option value="1">Assigned</option>
                                        <option value="0">Unassigned</option>
                                    </select>
                                </div>
                                <!-- Filter button -->
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form> --}}
                        {{-- <form method="get" action="{{ route('filter-carrier-history-admin') }}" class="mt-4">
                            @csrf
                            <div class="d-flex flex-wrap align-items-center">
                                <!-- Start Date input -->
                                <div class="form-group mb-3 me-3">
                                    <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control">
                                </div>
                                <!-- End Date input -->
                                <div class="form-group mb-3 me-3">
                                    <label for="end_date" class="text-lg font-semibold">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control">
                                </div>
                                <!-- Assigned To select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="assigned_to" class="text-lg font-semibold">Assigned To:</label>
                                    <select name="assigned_to" id="assigned_to" class="form-select">
                                        <option value="">Select Assigned To</option> <!-- Empty default option -->
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Status select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="status" class="text-lg font-semibold">Status:</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                                <!-- Approved/Unapproved select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="approved" class="text-lg font-semibold">Approved/Unapproved:</label>
                                    <select name="approved" id="approved" class="form-select">
                                        <option value="">Select Approval Status</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Unapproved</option>
                                    </select>
                                </div>
                                <!-- Assigned/Unassigned select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="assigned" class="text-lg font-semibold">Assigned/Unassigned:</label>
                                    <select name="assigned" id="assigned" class="form-select">
                                        <option value="">Select Assignment Status</option>
                                        <option value="1">Assigned</option>
                                        <option value="0">Unassigned</option>
                                    </select>
                                </div>
                                <!-- Filter button -->
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </form> --}}
                        
                        <form method="get" action="{{ route('filter-carrier-history-admin') }}" class="mt-4">
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
                                        <option value="">Select Assigned To</option> <!-- Empty default option -->
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <!-- Add space here -->
                            
                                <!-- Status select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="status" class="text-lg font-semibold">Status:</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                            
                                <!-- Add space here -->
                            
                                <!-- Approved/Unapproved select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="approved" class="text-lg font-semibold">Approved/Unapproved:</label>
                                    <select name="approved" id="approved" class="form-select">
                                        <option value="">Select Approval Status</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Unapproved</option>
                                    </select>
                                </div>
                            
                                <!-- Add space here -->
                            
                                <!-- Assigned/Unassigned select -->
                                <div class="form-group mb-3 me-3">
                                    <label for="assigned" class="text-lg font-semibold">Assigned/Unassigned:</label>
                                    <select name="assigned" id="assigned" class="form-select">
                                        <option value="">Select Assignment Status</option>
                                        <option value="1">Assigned</option>
                                        <option value="0">Unassigned</option>
                                    </select>
                                </div>
                            
                                <!-- Add space here -->
                            
                                <!-- Filter button -->
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>

                <div class="card-body">
                    <div class="">
                        <!-- Check if carriers are empty -->
                        @if ($filteredCarriers->isEmpty())
                            <p>No carriers found.</p>
                        @else
                            <!-- List of carriers -->
                            <ul class="list-group" id="itemsList">
                                @foreach ($filteredCarriers as $carrier)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="mb-1">{{ $carrier->companyName }}</h5>
                                            <p class="mb-1">MC#: {{ $carrier->mcNumber }}</p>
                                            <p class="mb-1">Phone: {{ $carrier->phone }}</p>
                                            <p class="mb-1">Email: {{ $carrier->email }}</p>
                                            <p class="mb-1">USDOT: {{ $carrier->usdot }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <!-- Update Assigned To form -->
                                            <div>
                                                {{-- <form
                                                    action="{{ route('updateCarrierAssignedUser', ['id' => $carrier->id]) }}"
                                                    method="POST" enctype="multipart/form-data"
                                                    class="row g-3 align-items-center">
                                                    @csrf
                                                    @method('PUT')
                                                    <label for="assigned_to" class="col-auto">Assigned To:</label>
                                                    <div class="col-auto">
                                                        <select name="assigned_to" class="form-select" aria-label="Select Assigned To">
                                                            @if ($carrier->assigned_to)
                                                                @php
                                                                    $userFound = false;
                                                                @endphp
                                                                @foreach ($users as $user)
                                                                    @if ($carrier->assigned_to == $user->id)
                                                                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                                        @php
                                                                            $userFound = true;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @if (!$userFound)
                                                                    <option value="" disabled selected>No user assigned</option>
                                                                @endif
                                                            @else
                                                                <option value="" disabled selected>No user assigned</option>
                                                            @endif
                                                            @foreach ($users as $user)
                                                                @if ($carrier->assigned_to != $user->id)
                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-auto">
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm me-1">Update</button>
                                                    </div>
                                                </form> --}}
                                                {{-- <form action="{{ route('updateCarrierAssignedUser', ['id' => $carrier->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3 align-items-center">
                                                    @csrf
                                                    @method('PUT')
                                                
                                                    <!-- Assigned To select -->
                                                    <label for="assigned_to" class="col-auto">Assigned To:</label>
                                                    <div class="col-auto">
                                                        <select name="assigned_to" class="form-select" aria-label="Select Assigned To">
                                                            @if ($carrier->assigned_to)
                                                                @php
                                                                    $userFound = false;
                                                                @endphp
                                                                @foreach ($users as $user)
                                                                    @if ($carrier->assigned_to == $user->id)
                                                                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                                        @php
                                                                            $userFound = true;
                                                                        @endphp
                                                                    @endif
                                                                @endforeach
                                                                @if (!$userFound)
                                                                    <option value="" disabled selected>No user assigned</option>
                                                                @endif
                                                            @else
                                                                <option value="" disabled selected>No user assigned</option>
                                                            @endif
                                                            @foreach ($users as $user)
                                                                @if ($carrier->assigned_to != $user->id)
                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Assigned/Unassigned select -->
                                                    <label for="assigned" class="col-auto">Assigned/Unassigned:</label>
                                                    <div class="col-auto">
                                                        <select name="assigned" class="form-select" aria-label="Select Assignment Status">
                                                            <option value="1">Assigned</option>
                                                            <option value="0">Unassigned</option>
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Approved/Unapproved select -->
                                                    <label for="approved" class="col-auto">Approved/Unapproved:</label>
                                                    <div class="col-auto">
                                                        <select name="approved" class="form-select" aria-label="Select Approval Status">
                                                            <option value="1">Approved</option>
                                                            <option value="0">Unapproved</option>
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Status select -->
                                                    <label for="status" class="col-auto">Status:</label>
                                                    <div class="col-auto">
                                                        <select name="status" class="form-select" aria-label="Select Status">
                                                            <option value="active">Active</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Update button -->
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-success btn-sm me-1">Update</button>
                                                    </div>
                                                </form> --}}
                                                <form action="{{ route('updateCarrierAssignedUser', ['id' => $carrier->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3 align-items-center">
                                                    @csrf
                                                    @method('PUT')
                                                
                                                    <div>
                                                        <!-- Assigned To select -->
                                                    <label for="assigned_to" class="col-auto">Assigned To:</label>
                                                    <div class="col-auto">
                                                        <select name="assigned_to" class="form-select" aria-label="Select Assigned To">
                                                            <option value="" {{ empty($carrier->assigned_to) ? 'selected' : '' }}>No user assigned</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}" {{ $carrier->assigned_to == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Assigned/Unassigned select -->
                                                    <label for="assigned" class="col-auto">Assigned/Unassigned:</label>
                                                    <div class="col-auto">
                                                        <select name="assigned" class="form-select" aria-label="Select Assignment Status">
                                                            <option value="" {{ $carrier->assigned === null ? 'selected' : '' }}>No assignment status</option>
                                                            <option value="1" {{ $carrier->assigned == 1 ? 'selected' : '' }}>Assigned</option>
                                                            <option value="0" {{ $carrier->assigned === 0 ? 'selected' : '' }}>Unassigned</option>
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Approved/Unapproved select -->
                                                    <label for="approved" class="col-auto">Approved/Unapproved:</label>
                                                    <div class="col-auto">
                                                        <select name="approved" class="form-select" aria-label="Select Approval Status">
                                                            <option value="" {{ $carrier->approved === null ? 'selected' : '' }}>No approval status</option>
                                                            <option value="1" {{ $carrier->approved == 1 ? 'selected' : '' }}>Approved</option>
                                                            <option value="0" {{ $carrier->approved === 0 ? 'selected' : '' }}>Unapproved</option>
                                                        </select>
                                                    </div>
                                                
                                                    <!-- Status select -->
                                                    <label for="status" class="col-auto">Status:</label>
                                                    <div class="col-auto">
                                                        <select name="status" class="form-select" aria-label="Select Status">
                                                            <option value="" {{ empty($carrier->status) ? 'selected' : '' }}>No status</option>
                                                            <option value="active" {{ $carrier->status == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="pending" {{ $carrier->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="rejected" {{ $carrier->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                
                                                    <!-- Update button -->
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-success btn-sm me-1">Update</button>
                                                    </div>
                                                </form>
                                                
                                                
                                            </div>
                                            <!-- Edit Carrier button -->
                                            <div>
                                                <form action="{{ route('editcarrier', ['id' => $carrier->id]) }}"
                                                    method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm me-1 ms-2">Edit</button>
                                                </form>
                                            </div>
                                            <!-- Delete Carrier button -->
                                            <div>
                                                <form action="{{ route('deleteCarrier', ['id' => $carrier->id]) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Are you sure you want to delete this carrier?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm me-1">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
    <!-- Add your custom scripts here -->
@endpush
