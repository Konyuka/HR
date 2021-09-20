@extends('layouts.main')

@push('header_scripts')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">  
@endpush

@section('content')
<div class="content container-fluid">
            
                <!-- Page Title -->
                <div class="row">
                    <div class="col-sm-4 col-5">
                        <h4 class="page-title">Employees List</h4>
                    </div>
                    <div class="col-sm-8 col-7 text-right m-b-30">
                    <a href="{{route('employee.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
                </div>
                <!-- /Page Title -->                                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable" id="employees-table">
                                <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Employee Names</th>                                     
                                        <th>Email</th>
                                        <th>Job Title </th>
                                        <th>Bank Branch</th> 
                                        <th class="text-center">Action</th>                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                                                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('footer_scripts')
<!-- Datatable JS -->
		{{-- <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script> --}}
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>


    <script type="text/javascript">
$(document).ready(function () {
//Initialize ajax csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });  


    $('#employees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('employees.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'names', name: 'names' },
            { data: 'email', name: 'email' },
            { data: 'job_title', name: 'job_title' },
            { data: 'bank_branch', name: 'bank_branch' }, 
            { data: 'action', name:'action',orderable: false, searchable: false },        
                    ]
    });

    // Delete investments with related data
        $("#employees-table").on("click",".btn-del",function()
        {           
            var _id=$(this).attr("value");           
              if (confirm("Are you Sure You want to delete this Employee ?")) {
                  $.ajax({
                      url: '{{ route('employee.destroy') }}',
                      method:'DELETE',
                      data:{_id:_id},
                      success:function(data)
                      {
                        $('#employees-table').DataTable().ajax.reload();
                      }
                  });
              }
        });
});
</script>
@endpush
