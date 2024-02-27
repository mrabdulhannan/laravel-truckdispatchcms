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

                            <form method="POST" action="{{ route('updateuseradmin', ['id' => $user->id]) }}">
                                @csrf
                                {{-- <div class="login-box">
                                    <div class="login-form"> --}}

                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('ID') }}</label>
                        
                                            <div class="">
                                                <input id="id" type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="id" value="{{$user->id}}" readonly autocomplete="name" autofocus>
                        
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                        
                                            <div class="">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                        
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                        
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        
                                            <div class="">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{$user->email}}" required autocomplete="email">
                        
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="user_type" class="form-label">{{ __('User Type (admin, sales, dispatch)') }}</label>
                        
                                            <div class="">
                                                <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror"
                                                    name="user_type" value="{{$user->user_type}}" required autocomplete="user_type" autofocus>
                        
                                                @error('user_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="salary_hour" class="form-label">{{ __('Per Hour Salary') }}</label>
                        
                                            <div class="">
                                                <input id="salary_hour" type="number" class="form-control @error('user_type') is-invalid @enderror"
                                                    name="salary_hour" value="{{$user->salary_hour}}" required autocomplete="user_type" autofocus>
                                            </div>
                                        </div>
        
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                        
                                            <div class="">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                                    autocomplete="new-password">
                        
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                        
                                        <div class="login-form-actions">
                                            <button type="submit" class="btn btn-primary"> <span class="icon"> <i
                                                        class="bi bi-arrow-right-circle"></i> </span>
                                                Update</button>
                                        </div>
                                    {{-- </div>
                                </div> --}}
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
