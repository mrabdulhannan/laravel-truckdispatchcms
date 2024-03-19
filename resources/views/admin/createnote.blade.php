@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Create Note</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('storenote')}}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">Select User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
