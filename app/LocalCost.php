<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalCost extends Model
{
    public function localcostdetail(){
        return $this->belongsTo('App\LocalCodeDetails','cost_id');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier','supplier_id');
    }
    public function agent(){
        return $this->belongsTo('App\CF','cf_agent');
    }
    public function bank(){
        return $this->belongsTo('App\Bank','bank_id');
    }
    public function destination(){
        return $this->belongsTo('App\Destination','destination_id');
    }
}
