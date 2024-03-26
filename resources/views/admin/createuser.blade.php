@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Create User</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registeruser') }}">
                        @csrf
                        <div class="login-box">
                            <div class="login-form">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                
                                    <div class="">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
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
                                            name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                {{-- <div class="mb-3">
                                    <label for="user_type" class="form-label">{{ __('User Type (admin, sales, dispatch)') }}</label>
                
                                    <div class="">
                                        <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror"
                                            name="user_type" value="{{ old('user_type') }}" required autocomplete="user_type" autofocus>
                
                                        @error('user_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="user_type" class="form-label">{{ __('User Type (admin, sales, dispatch, qa)') }}</label>
                                
                                    <div class="position-relative">
                                        <select id="user_type" class="form-control select-with-arrow @error('user_type') is-invalid @enderror"
                                            name="user_type" required autocomplete="user_type" autofocus>
                                            <option value="admin">Admin</option>
                                            <option value="sales">Sales</option>
                                            <option value="dispatch">Dispatch</option>
                                            <option value="qa">QA</option>
                                        </select>
                                        <i class="bi bi-caret-down arrow-icon"></i>
                                
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
                                            name="salary_hour" value="{{ old('user_type') }}" required autocomplete="user_type" autofocus>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                
                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password">
                
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="login-form-actions">
                                    <button type="submit" class="btn"> <span class="icon"> <i
                                                class="bi bi-arrow-right-circle"></i> </span>
                                        Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Adjust the position of the arrow icon */
.position-relative {
    position: relative;
}

/* Style for the arrow icon */
.arrow-icon {
    position: absolute;
    top: 50%;
    right: 10px; /* Adjust as needed */
    transform: translateY(-50%);
    pointer-events: none; /* Ensure the arrow doesn't interfere with select functionality */
}

input#password {
        -webkit-box-shadow: 0 0 0 30px white inset !important;
    }

    input#email {
        -webkit-box-shadow: 0 0 0 30px white inset !important;
    }
</style>