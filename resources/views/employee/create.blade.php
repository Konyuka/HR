@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="page-title">Add New Employee</h4>

            @include('includes.messages')
            <form method="POST" action="{{ route('employee.store')}}">
                @csrf
                <div class="form-group">
                    <label>Employee Number: </label>
                <input type="text" class="form-control" name="id" value="{{old('id')}}">
                </div>
                <div class="form-group">
                    <label>Employee Names: </label>
                    <input type="text" class="form-control" name="names" value="{{old('names')}}">
                </div>
                <div class="form-group">
                    <label>Email address: </label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label>Job Title: </label>
                    <input type="text" class="form-control" name="job_title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>Bank Branch: </label>
                    <input type="text" class="form-control" name="bank_branch" value="{{old('bank_branch')}}">
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Save New Employee </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
