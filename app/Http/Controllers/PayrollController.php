<?php

namespace App\Http\Controllers;

use App\Imports\PayrollsImport;
use App\Payroll;
use Excel;
use File;
use Log;
use Illuminate\Http\Request;
use App\Mail\PaySlipMail;
use App\Jobs\SendEmailsJob;


class PayrollController extends Controller
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

    public function import()
    {
        return view('payroll.import');
    }

    public function upload(Request $request)
    {

        //back end validation for already added payroll with given date
        $salary_for = $request->month . '-' . $request->year;
        $payroll = Payroll::where('salary_for', $salary_for)->first();
        if ($payroll) {
            return back()->with('error', 'Payroll for ' . $salary_for .
                ' has already been uploaded. Consider deleting it first before re uploading.');
        }

        //validate the file existence
        $this->validate($request, array(
            'payroll_file' => 'required',
        ));
        // Validate f file has the correct extension
        $extension = File::extension($request->payroll_file->getClientOriginalName());
        if (!($extension == "xlsx" || $extension == "xls" || $extension == "csv")) {
            return redirect()->back()->with('error', 'File is a ' . $extension . ' file.!! Please upload a valid EXCEL file..!!');
        }

        // At this point,all validations have passed.We can now proceed.
        Excel::import(new PayrollsImport($salary_for), $request->payroll_file);
        return redirect()->back()->with('success', 'File has been uploaded');

    }

    public function delete()
    {}

    public function create()
    {

    }
    public function listPayrolls()
    {
        $payrolls = Payroll::distinct()->get(['salary_for']);

        return view('payroll.list-payrolls')->with('payrolls', $payrolls);

    }
    public function listPayslips($salary_date)
    {
        return view('payroll.list-payslips')->with('salary_date', $salary_date);
    }

    public function viewEmployeePayslip($id)
    {
        $slip = Payroll::findOrFail($id);

        //return view('emails.email')->with('payslip', $slip);        
         return view('payroll.payslip')->with('payslip', $slip);        
    }

    public function sendPayslipsToEmail($which_month)
    {
        // $payrolls = Payroll::where('salary_for', $month)->with('employee')->select('payrolls.*');
        // foreach ($paysrolls as $payroll) {

        // }

        return view('payroll.sent');
    }

    public function destroy($salary_for)
    {
        $payrolls = Payroll::where('salary_for', $salary_for)->delete();
        return back()->with('success', 'Payroll has been deleted');
    }

    public function emailSlips($var)
    {        
        $payrolls = Payroll::where('salary_for', $var)->with('employee')->select('payrolls.*')->get();


        foreach ($payrolls as $payroll) {
            Log::info('Message have started being sent');
            // Log::info($payroll->employee->email);
            // Mail::to($payroll->employee->email)->send(new PaySlipMail($payroll));
            // ???? Mail::to($payroll->employee->email)->queue(new PaySlipMail($payroll));
            dispatch(new SendEmailsJob($payroll))->delay(now()->addSeconds(15));

           
        }
        


        return view('payroll.sent')->with('payrolls',$payrolls);
        
        // return view('payroll.sent')->with('emails_sent',$payrolls->count());
    }

}
