<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidatos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'telefone',
        'email',
        'senha'
    ];
}
