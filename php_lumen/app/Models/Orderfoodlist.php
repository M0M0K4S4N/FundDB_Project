<?php

namespace App\Models;

class Orderfoodlist extends BaseModel
{
    public function inOrder()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function cookBy()
    {
        return $this->belongsTo('App\Models\Employee', 'cook_by');
    }
    public function food()
    {
        return $this->belongsTo('App\Models\Food','food_id');
    }
}
