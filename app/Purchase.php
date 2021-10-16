<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function purchasedetails(){
        return $this->hasMany('App\Purchasedetails','purchase_id');
    }
    public function supplier(){
        return $this->hasOne('App\Supplier','id','supplier_id');
    }
}
