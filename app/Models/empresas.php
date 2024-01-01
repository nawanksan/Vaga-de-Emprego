<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'senha',
        'setor',
        'aprovada'
    ];

    public function vagas()
    {
        return $this->hasMany(vagas::class, 'id_empresa');
    }
}
