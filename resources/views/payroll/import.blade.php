@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2 my-2">

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>NOTE! </strong> Ensure all employees in payroll you are about to upload are already in the
                system. <br> Their IDs should exist in the list of available employees here <a
                    href="{{route('employee.list')}}" class="alert-link">Employees List</a>. <br>
                If one is missing,add him/her as new employee here <a href="{{route('employee.create')}}"
                    class="alert-link">Add New Employee</a> before uploading the Payroll.
                <br> Otherwise you can upload and stare at the errors all day long. <strong>Good Luck</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <h4 class="page-title">Upload Payroll</h4>

            @include('includes.messages')
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Download Template</label>
                <div class="col-lg-4">
                    <a class="btn btn-success btn-block set-btn" href="{{ route('download.template','PAYROLL_TEMPLATE.xlsx') }}"><i
                            class="fa fa-file-excel-o"></i></a>
                </div>
            </div>
            <form method="POST" action="{{ route('payroll.upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label class="col-sm-3 ">Payroll Description : </label>
                    <div class="col-sm-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating" name="month">
                                <option>Jan</option>
                                <option>Feb</option>
                                <option>Mar</option>
                                <option>Apr</option>
                                <option>May</option>
                                <option>Jun</option>
                                <option>Jul</option>
                                <option>Aug</option>
                                <option>Sep</option>
                                <option>Oct</option>
                                <option>Nov</option>
                                <option>Dec</option>
                            </select>
                            <label class="focus-label">Select Month</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating" name="year">
                                @for ($i = 2019; $i < 2022; $i++) <option>{{ $i }}</option>
                                    @endfor
                            </select>
                            <label class="focus-label">Select Year</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Employees Excel Sheet</label>
                    <div class="col-lg-7">
                        <input type="file" class="form-control" name="payroll_file">
                        <span class="form-text text-muted">Do you know what you are doing ?</span>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary " type="submit">Bulk Import Employees Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection