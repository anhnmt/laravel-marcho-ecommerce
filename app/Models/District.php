<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class District extends Model
{
    use Cachable;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'parent_code', 'code');
    }

    public function wards()
    {
        return $this->hasMany('App\Models\Ward', 'parent_code', 'code');
    }
}
