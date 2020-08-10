<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Blog extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use Cachable;

    protected $fillable = [
        'user_id', 'name', 'slug', 'image', 'description', 'body', 'status',
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id');
    }

    public function scopeKeyword($query, $request)
    {
        if ($request->has('keyword')) {
            $search_fields = [
                'name',
                'slug',
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
}
