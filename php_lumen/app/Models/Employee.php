<?php

namespace App\Models;

class Employee extends BaseModel
{
    public function supervisor()
    {
        return $this->belongsTo('App\Models\Employee', 'supervisor');
    }
    public function supervise()
    {
        return $this->hasMany('App\Models\Employee', 'supervisor');
    }
}
