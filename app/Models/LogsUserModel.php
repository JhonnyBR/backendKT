<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsUserModel extends Model
{
    use HasFactory;

    protected $table = "LogsTokenUser";

    protected $Fillables = [
        'idRelational',
        'DateTime'
    ];

    protected $primaryKey = 'idLog';
    
    protected $timestamp = FALSE;
}
