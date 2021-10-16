<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function customer(){
        return $this->hasOne('App\Customer','id','customer_id');
    }
    public function saledetails(){
        return $this->hasMany('App\SaleDetails','sale_id');
    }
}
