<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom','classroom_id'];

    public function myclasse(){
        return $this->belongsTo(Classe::class,'classroom_id');
    }
}
