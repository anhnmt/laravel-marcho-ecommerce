<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Favorite extends Model
{
    use Cachable;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
