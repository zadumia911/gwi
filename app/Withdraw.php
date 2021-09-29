<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
   public function bank(){
    return $this->belongsTo('App\Bank','bank_id','id');
   }
}
