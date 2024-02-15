<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{

    protected $fillable = [
        'id','type', 'value', 'date', 'username'
    ];

    protected $hidden = [
        
    ];
}
