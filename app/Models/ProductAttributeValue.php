<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'attribute_value_id', 'product_attribute_id',
    ];
}
