<!DOCTYPE html>
<html lang="en">

<head>
	<title>Employee Payroll</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="container">			

				<div class="email-box">
					<div class="account-wrapper">
						<!-- Page Title -->
						<div class="row">
							<div class="col-sm-5 col-4">
								<h4 class="page-title">Payslip</h4>
							</div>
						</div>
						<!-- /Page Title -->





						<div class="row">
							<div class="col-md-8 offset-md-2">
								<div class="card-box" id="payslip-item">
									<h4 class="payslip-title">Payslip</h4>
									<div class="row">
										<div class="col-sm-6 m-b-20">											
											<ul class="list-unstyled mb-0">
												<li>Goldenscape Group Limited</li>
												<li></li>
												<li></li>
											</ul>
										</div>
										<div class="col-sm-6 m-b-20">
											<div class="invoice-details">
												<h3 class="text-uppercase">Payslip # {{ $payslip->id}}</h3>
												<ul class="list-unstyled">
													<li>Salary Month: <span>{{ $payslip->salary_for}}</span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 m-b-20">
											<ul class="list-unstyled">
												<li>
													<h5 class="mb-0 text-uppercase">
														<strong>{{ $payslip->employee->names}}</strong></h5>
												</li>
												<li><span
														class="text-uppercase">{{ $payslip->employee->job_title}}</span>
												</li>
												<li>Employee ID: {{ $payslip->employee->id}}</li>
												<li class="text-uppercase">Bank A/c Branch:
													{{ $payslip->employee->bank_branch}}</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<div>
												<h4 class="m-b-10"><strong>Payments</strong></h4>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Basic Salary</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->gross_pay)}}</span></td>
														</tr>
														<tr>
															<td><strong>Leave Allowance</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->leave_allowance)}}</span>
															</td>
														</tr>
														<tr>
															<td><strong>Arrears</strong> <span class="float-right">Ksh
																	{{number_format($payslip->arrears)}}</span></td>
														</tr>
														<tr>
															<td><strong>Commission</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->commission)}}</span></td>
														</tr>
														<tr>
															<td><strong>Total Earnings</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->total_pay)}}</span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-6">
											<div>
												<h4 class="m-b-10"><strong>Deductions</strong></h4>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Pay As You Earn (P.A.Y.E)</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->paye)}}</span></td>
														</tr>
														<tr>
															<td><strong>NSSF-Employee</strong> <span
																	class="float-right">Ksh
																	{{number_format($payslip->nssf)}}</span></td>
														</tr>
														<tr>
															<td><strong>NHIF</strong> <span class="float-right">Ksh
																	{{number_format($payslip->nhif)}}</span></td>
														</tr>
														<tr>
															<td><strong>Insurance</strong> <span class="float-right">Ksh
																	{{number_format($payslip->insurance)}}</span></td>
														</tr>
														<tr>
															<td><strong>Recovery</strong> <span class="float-right">Ksh
																	{{number_format($payslip->recovery)}}</span></td>
														</tr>
														<tr>
															<td><strong>Total Deductions</strong> <span
																	class="float-right"><strong>Ksh
																		{{number_format($payslip->total_deductions)}}</strong></span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-sm-12">
											<p><strong>Net Salary: Ksh {{number_format($payslip->net_amount)}}</strong>
											</p>
										</div>
										<div class="col-sm-12 mb-2">
											<p class="text-muted">PAYMENT BY BANK TRANSFER</p>
										</div>
										<div class="col-sm-6">
											<div>
												<table class="table table-sm table-borderless">
													<tbody>
														<tr>
															<td>STATEMENT VALUES</td>
														</tr>
														<tr>
															<td>NSSF-Employer</td>
															<td>Ksh {{number_format($payslip->nhif)}}</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>

</body>

</html>