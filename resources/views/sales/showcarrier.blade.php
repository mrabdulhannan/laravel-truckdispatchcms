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
                    <h2 class="card-title">My Carrier</h2>
                    <form method="get" action="{{ route('filter-carrier-history') }}">
                        @csrf
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required>

                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required>

                        <button type="submit">Filter</button>
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
                                            <form action="{{ route('editcarrier', ['id' => $carrier->id]) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('deleteCarrier', ['id' => $carrier->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this carrier?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
