<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyExpense extends Model
{
    public function expensehead(){
        return $this->belongsTo('App\ExpenseHead','expense_head_id');
    }
}
