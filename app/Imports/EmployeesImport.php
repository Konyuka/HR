<?php

namespace App\Imports;

use App\Employee;
//use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeesImport implements ToModel, WithStartRow, WithValidation
{

    public function rules(): array
    {
        return [
            '0' => Rule::unique('employees', 'id'),
        ];
    }
    public function customValidationMessages()
    {
        return [
            '0.unique' => 'An employee exists in the system with that id.
            Delete him/her from excel file and import ONLY new employees.
            Alternatively,add employee one by one from Add New menu ',
        ];
    }    
    /**
     * @param array $model
     */
    public function model(array $row)
    {
        return new Employee([
            'id' => $row[0],
            'names' => $row[1],
            'email' => $row[2],
            'job_title' => $row[3],
            'bank_branch' => $row[4],
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
