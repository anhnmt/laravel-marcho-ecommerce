<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class ProductAttribute extends Model
{
    use Cachable;

    protected $cacheCooldownSeconds = 600; // 5 minutes

    protected $fillable = [
        'product_id', 'quantity', 'price', 'sale_price', 'default',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributesValues()
    {
        return $this->belongsToMany('App\Models\AttributeValue');
    }
}
