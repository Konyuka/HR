@extends('layouts.main')

@section('content')

<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">

                <h4 class="page-title">Import Employees Main Data</h4>
                @include('includes.messages')
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Download Template</label>
                    <div class="col-lg-4">
                        <a class="btn btn-success btn-block set-btn" href="{{ route('download.template','EMPLOYEE_TEMPLATE.xlsx') }}"><i
                                class="fa fa-file-excel-o"></i></a>
                    </div>
                </div>
                <form method="POST" action="{{route('employee.upload')}}" enctype="multipart/form-data" >

                @csrf
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Employees Excel Sheet</label>
                    <div class="col-lg-7">
                        <input type="file" class="form-control" name="file">
                        <span class="form-text text-muted">Do you know what you are doing ?</span>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary" type="submit">Bulk Import Employees Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
