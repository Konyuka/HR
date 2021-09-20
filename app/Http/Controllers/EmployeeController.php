<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Http\Requests\EmployeeData;
use App\Http\Requests\EmployeeUpdateData;
use App\Imports\EmployeesImport;
use App\Payroll;
use DB;
use Excel;
use File;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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

    public function index()
    {
        $employees_count = Employee::count();
        //$payslips_count=Payroll::count();
        $payslips_count = Payroll::count();
        $payrolls_count = DB::table('payrolls')->distinct('salary_for')->count('salary_for');
        $users = User::count();
        return view('employee.home', ['payrolls' => $payrolls_count,
            'employees' => $employees_count,
            'payslips' => $payslips_count,
            'users' => $users]);

    }

    public function create()
    {
        return view('employee.create');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit')->with('employee', $employee);
    }

    public function update(EmployeeUpdateData $request, $id)
    {

        $employee = Employee::findOrFail($id);

        $employee->update($request->except('id'));

        return back()->with('success', 'Employee has been updated');

    }

    public function destroy(Request $request)
    {
        $_id = $request->input('_id');
        $employee = Employee::findOrFail($_id);
        if ($employee->delete()) {
            echo "Employee has been deleted";
        }
    }

    function list() {
        return view('employee.list');
    }

    public function import()
    {
        return view('employee.import');
    }

    public function store(EmployeeData $request)
    {
        $employee = new Employee;
        $employee->id = $request->id;
        $employee->names = $request->names;
        $employee->email = $request->email;
        $employee->job_title = $request->job_title;
        $employee->bank_branch = $request->bank_branch;

        $employee->save();

        return redirect()->back()->with('success', 'New Employee has been added to the system');

    }

    public function upload(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required',
        ));

        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

            Excel::import(new EmployeesImport, $request->file);
            return redirect()->back()->with('success', 'File has been uploaded');

        } else {
            return redirect()->back()->with('error', 'File is a ' . $extension . ' file.!! Please upload a valid EXCEL file..!!');

        }

    }

}
