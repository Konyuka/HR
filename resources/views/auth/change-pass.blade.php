@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="page-title">Change Password</h4>

            @include('includes.messages')
            <form method="POST" action="{{ route('user.updatepass')}}">
                @csrf
                <div class="form-group">
                    <label>Current password</label>
                    <input type="password" class="form-control" name="current_password">
                </div>
                <div class="form-group">
                    <label>New password</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" class="form-control" name="repeat_password">
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection