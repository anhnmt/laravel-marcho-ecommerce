<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use BinaryCats\Sku\HasSku;

class Product extends Model
{
    use Sluggable, HasSku;

    protected $fillable = [
        'category_id', 'name', 'slug', 'image', 'body', 'description', 'status',
    ];

    /**
     * Define relationship with the Category
     *
     * @return void
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

    /**
     * Define relationship with the Category
     *
     * @return void
     */
    public function skus()
    {
        return $this->hasOne(Sku::class, 'id', 'product_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
