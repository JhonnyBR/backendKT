<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model
{
    use HasFactory;

    protected $table= 'cliente';

    protected $fillables = [
        'nombre',
        'documento',
        'email',
        'addres',
        'telefono',
        'departamento',
        'ciudad'
    ];

    protected $primaryKey = 'idCliente';

    public $timestamps = false;
}
