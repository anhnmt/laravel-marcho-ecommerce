<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkuValue extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'option_id', 'sku_id',
    ];

    /**
     * Define relationship with the Option
     *
     * @return void
     */
    public function options()
    {
        return $this->hasMany(Option::class, 'option_id', 'id');
    }

    /**
     * Define relationship with the Sku
     *
     * @return void
     */
    public function skus()
    {
        return $this->hasMany(Sku::class, 'sku_id', 'id');
    }
}
