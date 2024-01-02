@extends('layouts.app')

@push('stylesheet-page-level')
@endpush
@section('content')
    <!-- Row start -->
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h2 class="card-title">All Topics</h2>
                </div>
                <div class="card-body">
                    <div class="">
                        <h1>Dispatch Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
    {{-- <script>
    function editCategory(categoryId) {
        // Assuming you have a route for editing
        window.location.href = "{{ route('editCategory') }}/" + categoryId;
    }
</script> --}}
@endpush
