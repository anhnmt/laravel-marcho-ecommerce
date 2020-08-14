<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Comment extends Model
{
    use Cachable;

    protected $fillable = [
        'parent_id',
        'user_id',
        'blog_id',
        'body',
    ];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }
}
