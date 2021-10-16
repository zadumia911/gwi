<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerCollection extends Model
{
    public function customer(){
        return $this->hasOne('App\Customer','id','customer_id');
    }
    public function bank(){
        return $this->hasOne('App\Bank','id','bank_id');
    }
}
