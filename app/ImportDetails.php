<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetails extends Model
{
    public function product(){
       return $this->hasOne('App\Product','id','item_id');
    }
}
