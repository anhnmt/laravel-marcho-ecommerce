<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Contact extends Model
{
    use Cachable;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
