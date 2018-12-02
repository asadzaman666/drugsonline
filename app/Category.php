<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function medicine(){

        return $this->hasMany('App\Medicine');
    }
}
