<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DailyExpense;
use App\ExpenseHead;
use Toastr;


class DailyExpenseController extends Controller
{    
    public function add(){
        $expense_head = ExpenseHead::where('status',1)->get();
        return view('backEnd.dailyexpense.add',compact('expense_head'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'expense_head_id'=>'required',
            'expense_type_id'=>'required',
            'comment'=>'required',
            'expense_amount'=>'required',
            'status'=>'required',
        ]);
        $store_data                        =   new DailyExpense();
        $store_data->expense_head_id       =   $request->expense_head_id;
        $store_data->expense_type_id       =   $request->expense_type_id;
        $store_data->expense_date          =   $request->expense_date;
        $store_data->comment               =   $request->comment;
        $store_data->expense_amount        =   $request->expense_amount;
        $store_data->status                =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/dailyexpense/manage');
    }
    public function manage(){
        $show_datas = DailyExpense::with('expensehead')->latest()->get();
        return view('backEnd.dailyexpense.manage',compact('show_datas'));
    }
    public function edit($id){
        $expense_head = ExpenseHead::where('status',1)->get();
        $edit_data = DailyExpense::find($id);
        return view('backEnd.dailyexpense.edit',compact('edit_data', 'expense_head'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'expense_head_id'=>'required',
            'expense_type_id'=>'required',
            'comment'=>'required',
            'expense_amount'=>'required',
            'status'=>'required',
        ]);
        $update_data                       =   DailyExpense::find($request->hidden_id);
        $update_data->expense_head_id      =   $request->expense_head_id;
        $update_data->expense_type_id      =   $request->expense_type_id;
        $update_data->expense_date         =   $request->expense_date;
        $update_data->comment              =   $request->comment;
        $update_data->expense_amount       =   $request->expense_amount;
        $update_data->status               =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/dailyexpense/manage');
    }
    public function inactive(Request $request){
        $inactive_data = DailyExpense::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/dailyexpense/manage');      
    }
    public function active(Request $request){
        $inactive_data = DailyExpense::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/dailyexpense/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = DailyExpense::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/dailyexpense/manage');         
    }
}