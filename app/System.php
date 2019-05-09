<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    
    public function planets(){
        return $this->hasMany('App/Planet');
    }

}
