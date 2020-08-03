<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'total', 'address', 'note', 'status', 'user_id' ,'city_id', 'district_id', 'ward_id'
    ];
}
