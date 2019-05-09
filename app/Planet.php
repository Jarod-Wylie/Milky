<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    
    public function system(){
        return $this->belongsTo("App/System");
    }
}
