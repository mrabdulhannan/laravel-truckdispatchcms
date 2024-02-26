@extends('layouts.app')

@push('stylesheet-page-level')
@endpush
@section('content')
    @php
        $filteredload = isset($filteredload) ? $filteredload : Auth::user()->defineload;
    @endphp
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">My Loads</h2>
                    <form method="get" action="{{ route('filter-carrier-history') }}" class="flex flex-col space-y-4">
                        @csrf
                        <label for="start_date" class="text-lg font-semibold">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    
                        <label for="end_date" class="text-lg font-semibold">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required class="border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    
                        <button type="submit" class="bg-blue-500 font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300">Filter</button>
                    </form>
                    
                </div>
                <div class="card-body">
                    <div class="">
                        <ul class="list-group" id="itemsList">

                            @foreach ($filteredload as $load)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{-- @php
                                        var_dump($load);
                                    @endphp --}}
                                    <div>
                                        <p class="mb-1">Serial No: {{ $load->srno }}</p>
                                        <p class="mb-1">Carrier: {{ $load->carrier }}</p>
                                        <p class="mb-1">Agent Name: {{ $load->agentname }}</p>
                                        <p class="mb-1">Company Name: {{ $load->companyname }}</p>
                                        <p class="mb-1">MC: {{ $load->mc }}</p>
                                        <p class="mb-1">Driver's truck Type: {{ $load->driverstruck }}</p>
                                        <p class="mb-1">Driver Name: {{ $load->name }}</p>
                                        <p class="mb-1">Contact: {{ $load->contact }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <div>
                                            <form action="{{ route('editload', ['id' => $load->id]) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                        </div>
                                        <div>
                                            <form action="{{ route('deleteload', ['id' => $load->id]) }}" method="post"
                                                onsubmit="return confirm('Are you sure you want to delete this load?')">
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
