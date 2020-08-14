<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Review extends Model
{
    use Cachable;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'body',
    ];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
