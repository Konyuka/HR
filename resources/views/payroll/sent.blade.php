@extends('layouts.main')

@section('content')
<div class="content container-fluid">
    <div class="row mt-5 d-flex ">
        <div class="col-6 mx-auto">
            <div class="card-box text-center">
                <h3 class="card-title ">Sending Status</h3>
                <i class="fa fa-thumbs-up text-success fa-5x mt-2 mb-4"></i>
                <h4 class="text-muted mb-3"> <strong> {{$payrolls->count()}} </strong>  mails have been queued to be sent. Estimated delivery time is atmost 60
                    minutes.</h4>                 
             </div>
        </div>
    </div>
</div>
@endsection