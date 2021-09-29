<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeepayment extends Model
{
    public function employee(){
      return $this->hasOne('App\Employee', 'id' ,'employee_id');
    }
}
