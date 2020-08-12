<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class City extends Model
{
    use Cachable;

    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany('App\Models\District', 'parent_code', 'code');
    }

    public function wards()
    {
        return $this->hasManyThrough('App\Models\Ward', 'App\Models\District', 'parent_code', 'parent_code', 'code', 'code');
    }
}
