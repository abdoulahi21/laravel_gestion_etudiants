<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('first_name','last_name','email','age','adresse')->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            'first_name',
            'last_name',
            'email',
            'age',
            'adresse',
        ];
    }
}
