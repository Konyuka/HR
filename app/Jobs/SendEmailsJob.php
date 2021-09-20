<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\PaySlipMail;
use App\Payroll;


class SendEmailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payslip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Payroll $payslip)
    {
        $this->payslip=$payslip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {       
        \Mail::to($this->payslip->employee->email)->send(new PaySlipMail($this->payslip));
      
    }
}
