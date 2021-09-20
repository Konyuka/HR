<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $fillable = ['id', 'employee_id', 'salary_for',
        'gross_pay', 'commission',
        'leave_allowance', 'total_pay',
        'paye', 'nhif',
        'nssf', 'helb',
        'insurance', 'lost_hours',
        'sacco', 'recovery',
        'arrears', 'total_deductions',
        'net_amount',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
