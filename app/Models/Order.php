<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'email', 'phone', 'total', 'address', 'note', 'status', 'user_id' ,'city_id', 'district_id', 'ward_id'
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function orderUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo('App\Models\Ward', 'ward_id', 'id');
    }
}
