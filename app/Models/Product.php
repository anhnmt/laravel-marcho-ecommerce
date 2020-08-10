<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use BinaryCats\Sku\HasSku;
use BinaryCats\Sku\Concerns\SkuOptions;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jackiedo\Cart\Contracts\UseCartable; // Interface
use Jackiedo\Cart\Traits\CanUseCart;     // Trait

class Product extends Model implements UseCartable
{
    use CanUseCart;
    use Sluggable;
    use SluggableScopeHelpers;
    use HasSku;
    use Cachable;

    // protected $with = ['roles.permissions', 'permissions'];

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'image',
        'description',
        'body',
        'quantity',
        'price',
        'sale_price',
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

    /**
     * Get the options for generating the Sku.
     *
     * @return BinaryCats\Sku\Concerns\SkuOptions;
     */
    public function skuOptions(): SkuOptions
    {
        return SkuOptions::make()
            ->from(['slug']);
    }

    /**
     * Define relationship with the Category
     *
     * @return void
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany('App\Models\ProductAttribute');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function scopeKeyword($query, $request)
    {
        if ($request->has('keyword')) {
            $search_fields = [
                'name',
                'slug',
                // 'sku',
                'description',
                'body',
            ];

            $search_terms = explode(' ', $request->keyword);

            foreach ($search_terms as $term) {
                $query->orWhere(function ($query) use ($search_fields, $term) {
                    foreach ($search_fields as $field) {
                        $query->orWhere($field, 'LIKE', '%' . $term . '%');
                    }
                });
            }
        }

        return $query;
    }

    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        return $query;
    }

    public function scopePrice($query, $request)
    {
        if ($request->has('from_price') && $request->has('to_price')) {
            $query->whereBetween('price', [$request->from_price, $request->to_price]);
        }

        return $query;
    }

    public function scopeAttributes($query, $request)
    {
        if ($request->has('attributes')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        return $query;
    }
}
