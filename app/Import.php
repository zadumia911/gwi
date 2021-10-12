<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    public function importdetails(){
        return $this->hasMany('App\importdetails','import_id');
    }
}
