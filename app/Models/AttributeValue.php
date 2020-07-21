<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class AttributeValue extends Model
{
    use Sluggable;

    protected $fillable = [
        'value', 'code',
    ];

    public function sluggable()
    {
        return [
            'code' => [
                'source' => 'value'
            ]
        ];
    }
}
