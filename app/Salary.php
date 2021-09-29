<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    public function employee(){
      return $this->hasOne('App\Employee', 'id' ,'employee_id');
    }
}
