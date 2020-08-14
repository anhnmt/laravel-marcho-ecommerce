<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Category extends Model
{
    use Sluggable;
    use Cachable;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    
}
