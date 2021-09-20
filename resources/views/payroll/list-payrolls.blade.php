@extends('layouts.main')

@section('content')
<div class="content container-fluid">
	<!-- Page Title -->
	<div class="row">
		<div class="col-sm-4 col-5">
			<h4 class="page-title">Uploaded Payrolls</h4>
		</div>

	</div>
	<!-- /Page Title -->
	<div class="row">
		<div class="col-sm-8 offset-sm-2">

			@include('includes.messages')
			<!-- Payroll Lists Table -->
			<div class="payroll-table card">
				<div class="table-responsive">
					<table class="table table-hover table-radius">
						<thead>
							<tr>
								<th>#</th>
								<th>Payroll For</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if (count($payrolls)> 0)
							@foreach ($payrolls as $item)
							<tr>
								<th>1</th>
								<td>{{ $item->salary_for}}</td>
								<td><a class="btn btn-sm btn-primary"
										href="{{route('payroll.slips',$item->salary_for)}}">Generate Slips</a></td>								
								<td>
									<form action="{{ route('payroll.destroy',$item->salary_for )}}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-sm btn-danger"
											onclick="return confirm('Are you sure you want to Remove?');"><span>Delete</span></button>
									</form>
								</td>

							</tr>
							@endforeach
							@endif



						</tbody>
					</table>
				</div>
			</div>
			<!-- /Payroll Additions Table -->
		</div>
	</div>
</div>
@endsection