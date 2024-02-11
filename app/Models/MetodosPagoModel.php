<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodosPagoModel extends Model
{
    use HasFactory;
    protected $table = "metodos_pago";

    protected $fillables = [
        'nombre'
    ];

    protected  $primaryKey = 'idMetodosPago';
    
    public $timestamps = false;
}
