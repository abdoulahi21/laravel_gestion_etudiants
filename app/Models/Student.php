<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'age',
        'adresse',
        'name_image',
    ];
   public function classes(){
            return $this->belongsToMany(Classe::class,'pivots','id_students',
                'id_classe')->withPivot('anneAcademique');
        }
}
