<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $fillable = ['id','names','email','job_title','bank_branch'];

    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }
}
