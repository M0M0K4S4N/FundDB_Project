<?php

namespace App\Models;

class Promotion extends BaseModel
{
    public function havePromotion() {
        return $this->belongsTo('App\Models\Food','discount_for');
    }
}
