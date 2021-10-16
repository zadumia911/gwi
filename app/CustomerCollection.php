<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerCollection extends Model
{
<<<<<<< HEAD
    public function customer(){
        return $this->hasOne('App\Customer','id','customer_id');
    }
    public function bank(){
        return $this->hasOne('App\Bank','id','bank_id');
    }
=======
    //
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
}
