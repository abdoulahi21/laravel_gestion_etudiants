<?php

namespace App\Imports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImportClass implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function model(array $row)
    {
        //dd($row);
        // Define how to create a model from the Excel row data
        $student = Student::create([
            'last_name' => $row["last_name"],
            'first_name' => $row["first_name"],
            'email' => $row["email"],
            'age' => $row["age"],
            'adresse' => $row["adresse"],
        ]);
        $student->classes()->attach($row["classe"], ['anneAcademique' => $row["anneacademique"]]);
        return $student;
    }
}
