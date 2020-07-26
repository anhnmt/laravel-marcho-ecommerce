<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Slider extends Model
{
    use Cachable;

    protected $fillable = [
        'name',
        'body',
        'link',
        'image',
        'status',
    ];
}
