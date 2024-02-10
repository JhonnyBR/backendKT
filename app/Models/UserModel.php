<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = "User";

    protected $Fillables = [
        'Name',
        'Document',
        'Active'
    ];

    protected $primaryKey = 'idUser';
    
    protected $timestamp = FALSE;
}
