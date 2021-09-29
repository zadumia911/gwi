<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salary;
use App\Employee;

class ReportsController extends Controller
{
    public function empsalaryreport(Request $request)
    {
        if($request->start_date && $request->end_date){
            $salaries = Salary::with('salaryhead')->where('employee_id',$request->employee_id)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
            $payments = Salary::where('employee_id',$request->employee_id)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
            $start_date = $request->start_date;
            $end_date   = $request->end_date;
            $employee_info  = Employee::find($request->employee_id);
            return view('backEnd.reports.employee.salary',compact('salaries','payments','start_date','end_date','employee_info'));
        }else{
            $start_date = '';
            $end_date   = '';
            return view('backEnd.reports.employee.salary',compact('start_date','end_date'));
        }
       
    }
}
