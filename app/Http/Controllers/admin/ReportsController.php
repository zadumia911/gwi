<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerCollection;
use App\BankStatement;
use App\DailyExpense;
use App\ExpenseHead;
use App\Employee;
use App\Salary;
use App\Bank;
use App\Sale;
use Carbon\Carbon;
use DB;
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
    public function bankstatement(Request $request){
        if($request->bank_id){
           $show_datas = BankStatement::where(['status'=>1,'bank_id'=>$request->bank_id])->with('bank')->get();
        }else{
            $show_datas = BankStatement::where('status',1)->with('bank')->get();
            
        }
        $banks = Bank::where('status',1)->get();
        return view('backEnd.reports.bankstatement',compact('show_datas','banks'));
    } 
    public function expencereport(Request $request){
         if($request->expence_head==NULL && $request->start_date && $request->end_date){
            $show_datas = DailyExpense::with('expensehead')->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->expence_head && $request->start_date && $request->end_date){
            $show_datas = DailyExpense::with('expensehead')->where('expense_head_id',$request->expence_head)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->expence_head && $request->start_date==NULL && $request->end_date==NULL){
            $show_datas = DailyExpense::with('expensehead')->where('expense_head_id',$request->expence_head)->latest()->get();
        }else{
            $show_datas = DailyExpense::with('expensehead')->latest()->get();
        }
        $expencehead = ExpenseHead::get();
        $expence_head = $request->expence_head;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.reports.expence',compact('show_datas','expence_head','start_date','end_date','expencehead'));
    }
    public function incomereport (Request $request){
         if($request->start_date && $request->end_date){
            $total_sale = Sale::whereBetween('created_at',[$request->start_date,$request->end_date])->sum('total_amount');
            $total_discount = Sale::whereBetween('created_at',[$request->start_date,$request->end_date])->sum('discount');
            $cost_amount = Sale::whereBetween('created_at',[$request->start_date,$request->end_date])->sum('cost_amount');
            $expence = DailyExpense::whereBetween('created_at',[$request->start_date,$request->end_date])->sum('expense_amount');
        }else{
            $total_sale = Sale::where('created_at', Carbon::today())->sum('total_amount');
            $total_discount = Sale::where('created_at', Carbon::today())->sum('discount');
            $cost_amount = Sale::where('created_at', Carbon::today())->sum('cost_amount');
            $expence = DailyExpense::where('created_at', Carbon::today())->sum('expense_amount');
        }
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.reports.income',compact('start_date','end_date','total_sale','total_discount','cost_amount','expence'));
    }
    public function cashbook(Request $request){
        if($request->start_date && $request->end_date){
            
        }else{
            $expence = DailyExpense::orderBy('id','ASC')->get();
            $collection = CustomerCollection::orderBy('id','ASC')->get();
        }
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.reports.cashbook',compact('start_date','end_date','expence','collection'));
    }

}
