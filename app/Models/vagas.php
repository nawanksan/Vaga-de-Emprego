<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vagas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_empresa',
        'titulo',
        'descricao',
        'requisitos',
        'salario',
        'total_candidatos'
    ];


    public function empresa()
    {
        return $this->belongsTo(empresas::class, 'id_empresa');
    }

    public function inscricoes()
    {
        return $this->hasMany(inscricoes::class, 'id_vaga');
    }
}
