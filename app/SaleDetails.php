<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    public function product(){
      return $this->hasOne('App\Product','id','product_id');
   }
}
