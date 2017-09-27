<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['nome', 'foto', 'datanasc', 'numero', 'partido'];
    
    Public $rules = [
        'nome' => 'required|max:50',  
        'numero' => 'required|numeric', 
        'partido' => 'required|max:50'
    ];
}
