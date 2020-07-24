<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValueProductAttribute extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_value_product_attribute';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'attribute_value_id', 'product_attribute_id',
    ];
}
