<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payroll;
use DataTables;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllEmployees()
    {
        $employee = Employee::query();
        return DataTables::of($employee)
            ->addColumn('action', function ($employee) {
                return '<div class="text-center">
                <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="' . route('employee.edit', $employee->id) . '" >
                                                    <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <button type="button" class="dropdown-item btn-del" value="' . $employee->id . '" >
                                                    <i class="fa fa-trash m-r-5"></i>Del</button>
                                                </div>
                                            </div>
                                            </div>';
            })
            ->make(true);
    }

    public function getMonthlyPayslips($month)
    {
        //$payrolls= Payroll::where('salary_for',$month)->with('employees.*');
        $payrolls = Payroll::where('salary_for', $month)->with('employee')->select('payrolls.*');

        return DataTables::of($payrolls)
            ->addColumn('action', function ($payrolls) {
                return '<a class="btn btn-sm btn-primary" href=" ' . route('payroll.slip', $payrolls->id) . ' ">Generate Slip</a>';
            })
            ->make(true);
    }
}
