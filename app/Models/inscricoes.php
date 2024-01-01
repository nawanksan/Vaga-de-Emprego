<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscricoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_vaga',
        'id_candidato',
        'aprovado'
    ];


    public function vaga()
    {
        return $this->belongsTo(vagas::class, 'id_vaga');
    }
}
