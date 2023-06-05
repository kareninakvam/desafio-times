<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'telefone',
        'cpf',
        'cor',
        'marca',
        'placa',
    ];
}
