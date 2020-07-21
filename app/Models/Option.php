<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'attribute_id', 'attribute_value_id',
    ];

    /**
     * Define relationship with the Product
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    /**
     * Define relationship with the Attribute
     *
     * @return void
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'attribute_id', 'id');
    }

    /**
     * Define relationship with the AttributeValue
     *
     * @return void
     */
    public function attribute_values()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_value_id', 'id');
    }
}
