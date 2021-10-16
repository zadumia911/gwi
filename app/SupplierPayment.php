<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    public function supplier(){
        return $this->hasOne('App\Supplier','id','supplier_id');
    }
    public function bank(){
        return $this->hasOne('App\Bank','id','bank_id');
    }
}
