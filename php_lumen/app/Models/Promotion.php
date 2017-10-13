<?php

namespace App\Models;

class Promotion extends BaseModel
{
    public function forFood() {
        return $this->belongsTo('App\Models\Food','discount_for');
    }
}
