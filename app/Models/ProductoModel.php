<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
        'nombre',
        'sku',
        'precio',
        'compare_precio',
        'cant'
    ];

    protected $primaryKey = 'idProducto';

    public $timestamps = false;

}
