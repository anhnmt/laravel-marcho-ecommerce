<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name',
        'body',
        'link',
        'image',
        'status',
    ];
}
