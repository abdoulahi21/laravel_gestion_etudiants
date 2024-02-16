<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table='classes';
    protected $fillable=[
       'libelle',
        ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'pivot', 'id_classe',
            'id_students')->withPivot('anneAcademique');
    }

}
