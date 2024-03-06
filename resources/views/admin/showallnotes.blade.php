@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">All Notes</h2>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Comment</th>
                                <th>Read</th>
                                <th>Assigned To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{ $note->id }}</td>
                                    <td>{{ $note->user_id }}</td>
                                    <td>{{ $note->comment }}</td>
                                    <td>{{ $note->read ? 'Yes' : 'No' }}</td>
                                    <td>
                                        @if($note->assigned_to)
                                            {{ \App\Models\User::find($note->assigned_to)->name }}
                                        @else
                                            Not Assigned
                                        @endif
                                    </td>
                                    <td>
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
