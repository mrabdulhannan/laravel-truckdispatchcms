@extends('layouts.app')

@section('content')
@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">All Users</h2>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Salary/Hour</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>{{ $user->salary_hour }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <form action="{{ route('edituser', ['id' => $user->id]) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm me-1">Edit</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('deleteuser', ['id' => $user->id]) }}" method="post"
                                                    onsubmit="return confirm('Are you sure you want to delete this load?')">
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

<div class="container">
    <h1>All Users</h1>

</div>
@endsection
