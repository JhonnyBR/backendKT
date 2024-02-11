<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodosEnvioModel extends Model
{
    use HasFactory;
    protected $table = "metodos_envio";

    protected $fillables = [
        'nombre',
        'valor'
    ];

    protected  $primaryKey = 'idMetodosEnvio';
    
    public $timestamps = false;
}
