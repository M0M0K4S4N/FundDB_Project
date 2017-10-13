<?php

namespace App\Models;

class Customer extends BaseModel
{
    public function haveOrders()
    {
        return $this->hasMany('App\Models\Order', 'customer_id');
    }
}
