<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Attribute extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function attribute_values()
    {
        return $this->hasMany('App\Models\AttributeValue');
    }
}
