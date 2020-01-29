<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidexProducts extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'discount'
    ];
    
    protected $hidden = ['id', 'updated_at', 'created_at'];
}
