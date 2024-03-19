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
                    <h2 class="card-title">Sales Dashboard</h2>
                </div>
                <div class="card-body">
                    <div class="">
                        <h1>Show all Notes</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Read</th>
                                    <th>Assigned To</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedNotes as $note)
                                    <tr>
                                        <td>{{ $note->id }}</td>
                                        <td>{{ $note->user_id }}</td>
                                        <td><textarea readonly> {{ $note->comment }}</textarea></td>
                                        <td>{{ $note->read ? 'Yes' : 'No' }}</td>
                                        <td>
                                            @if($note->assigned_to)
                                                {{ \App\Models\User::find($note->assigned_to)->name }}
                                            @else
                                                Not Assigned
                                            @endif
                                        </td>
                                        {{-- <td>
                                            <div class="d-flex">
                                                <div>
                                                    <form action="{{ route('editnote', ['id' => $note->id]) }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm me-1">Edit</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <form action="{{ route('deletenote', ['id' => $note->id]) }}" method="post"
                                                        onsubmit="return confirm('Are you sure you want to delete this note?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm me-1">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
@endpush
