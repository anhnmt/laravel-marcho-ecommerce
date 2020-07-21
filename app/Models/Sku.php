<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'product_id', 'sku_value', 'price', 'sale_price',
    ];

    /**
     * Define relationship with the Product
     *
     * @return void
     */
    public function products()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }
}
