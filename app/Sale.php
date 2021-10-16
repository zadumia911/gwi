<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
<<<<<<< HEAD
    public function customer(){
        return $this->hasOne('App\Customer','id','customer_id');
    }
    public function saledetails(){
        return $this->hasMany('App\SaleDetails','sale_id');
    }
=======
    //
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
}
