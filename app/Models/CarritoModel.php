<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoModel extends Model
{
    use HasFactory;
    protected $table = "carrito";

    protected $fillables = [
        'descuento',
        'total',
        'subtotal'
    ];

    protected  $primaryKey = 'idCarrito';
    
    public $timestamps = false;
}
