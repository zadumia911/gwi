<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExpenseHead;
use Toastr;


class ExpenseHeadController extends Controller
{
    
    public function add(){
        return view('backEnd.expensehead.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'expense_head'=>'required',
            'status'=>'required',
        ]);
        $store_data                   =   new ExpenseHead();
        $store_data->expense_head     =   $request->expense_head;
        $store_data->slug             =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $store_data->status           =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/expensehead/manage');
    }
    public function manage(){
        $show_datas = ExpenseHead::latest()->get();
        return view('backEnd.expensehead.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = ExpenseHead::find($id);
        return view('backEnd.expensehead.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'expense_head'=>'required',
            'status'=>'required',
        ]);
        $update_data                    =   ExpenseHead::find($request->hidden_id);
        $update_data->expense_head      =   $request->expense_head;
        $update_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $update_data->status            =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/expensehead/manage');
    }
    public function inactive(Request $request){
        $inactive_data = ExpenseHead::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/expensehead/manage');      
    }
    public function active(Request $request){
        $inactive_data = ExpenseHead::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/expensehead/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = ExpenseHead::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/expensehead/manage');         
    }
}