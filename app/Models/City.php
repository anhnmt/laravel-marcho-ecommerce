<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany(District::class, 'parent_code', 'code');
    }

    public function wards()
    {
        return $this->hasManyThrough(Ward::class, District::class, 'parent_code', 'parent_code', 'code', 'code');
    }
}
