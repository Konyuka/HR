@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="page-title">Edit Employee</h4>

            @include('includes.messages')
        <form method="POST" action="{{ route('employee.update', $employee->id )}}" >
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Employee Number: </label>
                <input type="text" class="form-control" name="id" value="{{ $employee->id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Employee Names: </label>
                    <input type="text" class="form-control" name="names" value="{{ $employee->names }}">
                </div>
                <div class="form-group">
                    <label>Email address: </label>
                    <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label>Job Title: </label>
                    <input type="text" class="form-control" name="job_title" value="{{ $employee->job_title }}">
                </div>
                <div class="form-group">
                    <label>Bank Branch: </label>
                    <input type="text" class="form-control" name="bank_branch" value="{{ $employee->bank_branch }}">
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn" type="submit">Update Employee </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
