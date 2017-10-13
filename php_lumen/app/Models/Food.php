<?php

namespace App\Models;

class Food extends BaseModel
{
    public function inList()
    {
        return $this->hasMany('App\Models\Orderfoodlist','food_id');
    }
    public function havePromotion()
    {
        return $this->hasOne('App\Models\Promotion','discount_for');
    }
}
