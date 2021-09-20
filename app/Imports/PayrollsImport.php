<?php

namespace App\Imports;

use App\Payroll;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PayrollsImport implements ToModel, WithStartRow, WithValidation, WithCalculatedFormulas
{   
    protected $payroll_date = null;

    public function __construct($value)
    {
        $this->payroll_date = $value;
    }

    public function rules(): array
    {
        return [
            '0' => Rule::exists('employees', 'id'),
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.exists' => 'There exists an employee in the Payroll who has not been registered in the system.\n<br />
             Consider registering him/ and then re upload the file. .\n<br />
             Typical Kenyans dont follow instructions. ',
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $salary_date = $this->payroll_date;

        return new Payroll([
            'employee_id' => $row[0],
            'salary_for' => $salary_date,
            'gross_pay' => $row[1],
            'commission' => $row[2],
            'leave_allowance' => $row[3],
            'total_pay' => $row[4],
            'paye' => $row[5],
            'nhif' => $row[6],
            'nssf' => $row[7],
            'helb' => $row[8],
            'insurance' => $row[9],
            'lost_hours' => $row[10],
            'sacco' => $row[11],
            'recovery' => $row[12],
            'arrears' => $row[13],
            'total_deductions' => $row[14],
            'net_amount' => $row[15],
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
