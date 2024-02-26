@extends('layouts.app')

@push('stylesheet-page-level')
@endpush
@section('content')
        @php
        $filteredCarriers = isset($carriers) ? $carriers : carriers;
        @endphp
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">My Carrier</h2>
                    <form method="get" action="{{ route('filter-carrier-history-dispatch') }}" class="flex flex-col space-y-4">
                        @csrf
                        <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required
                            class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">

                        <label for="end_date" class="text-lg font-semibold">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required
                            class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">

                        <button type="submit"
                            class="bg-blue-500 font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300">Filter</button>
                    </form>
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
                                            
                                                <div>
                                            
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
                                        <div>
                                            <form action="{{ route('editcarrier', ['id' => $carrier->id]) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm ms-2">Edit</button>
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
