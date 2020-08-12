<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Ward extends Model
{
    use Cachable;

    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'parent_id', 'code');
    }
}
