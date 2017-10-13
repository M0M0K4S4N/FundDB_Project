<?php

namespace App\Models;

class Order extends BaseModel
{
    public function byCustomer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function haveFood()
    {
        return $this->hasMany('App\Models\Orderfoodlist','order_id');
    }
}
