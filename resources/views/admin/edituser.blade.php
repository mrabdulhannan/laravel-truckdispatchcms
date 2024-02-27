@extends('layouts.app')

@push('stylesheet-page-level')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    form {
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    .inputfull {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 50px;
        height: 2%;
        flex-wrap: wrap;
    }



    input[type="submit"] {
        background-color: #B41C43;
        color: #fff;
        cursor: pointer;

    }

    input[type="submit"]:hover {
        background-color: #a05668;
    }

    .ullist {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
</style>
@endpush

@section('content')
    <!-- Content wrapper scroll start -->
    <div class="content-wrapper-scroll">

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Update User</h2>

                            <form action="{{ route('updateCarrier', ['id' => $user->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <label class="label" for="user-id">User ID</label>
                                <input type="text" class="inputfull" id="user-id" name="user-id" value="{{$user->id}}" required>

                                <label class="label" for="user-email">User Email</label>
                                <input type="email" class="inputfull" id="user-email" name="user-email" value="{{$user->email}}" required>

                                <label class="label" for="user-name">User NAME</label>
                                <input type="text" class="inputfull" id="user-name" name="user-name" value="{{$user->name}}" required>

                                <label class="label" for="user-salary-our">User Per Hour Salary</label>
                                <input type="number" class="inputfull" id="user-salary-our" name="user-salary-our" value="{{$user->salary_hour}}" required>

                                <input type="submit" value="Update User" class="btn btn-success">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page-level')
@endpush
