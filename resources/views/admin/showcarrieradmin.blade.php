@extends('layouts.app')

@push('stylesheet-page-level')
@endpush
@section('content')
    @php
        $filteredCarriers = isset($filteredCarriers) ? $filteredCarriers : Auth::user()->definecarrier;
    @endphp
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="card-title">All Carrier</h2>
                    <form method="get" action="{{ route('filter-carrier-history-admin') }}" class="flex flex-col space-y-4">
                        @csrf
                        <div>
                            <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" 
                            class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">

                        <label for="end_date" class="text-lg font-semibold">End Date:</label>
                        <input type="date" id="end_date" name="end_date" 
                            class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="assigned_to" class="col-auto">Assigned To:</label>
                            <!-- Select element for assigned_to -->
                            <div class="col-auto">
                                <select name="assigned_to" class="form-select" aria-label="Select Assigned To">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300">Filter</button>
                    </form>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="">
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
                                        <div>
                                            <form action="{{ route('updateCarrierAssignedUser', ['id' => $carrier->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3 align-items-center">
                                                @csrf
                                                @method('PUT')
                                            
                                                <label for="assigned_to" class="col-auto">Assigned To:</label>
                                                <!-- Select element for assigned_to -->
                                                <div class="col-auto">
                                                    <select name="assigned_to" class="form-select" aria-label="Select Assigned To">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}" {{ $carrier->assigned_to == $user->id ? 'selected' : '' }}>
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            
                                                <!-- Button for form submission -->
                                                <div class="col-auto">
                                                    <button type="submit" class="btn btn-success btn-sm me-1">Update</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                        <div>
                                            <form action="{{ route('editcarrier', ['id' => $carrier->id]) }}"
                                                method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm me-1">Edit</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('deleteCarrier', ['id' => $carrier->id]) }}"
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this carrier?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-1">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
    {{-- <script>
    function editCarrier(carrierId) {
        // Assuming you have a route for editing
        window.location.href = "{{ route('editCarrier') }}/" + carrierId;
    }
</script> --}}
@endpush
