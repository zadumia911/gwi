<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bank;
use Toastr;
class BankController extends Controller
{
    public function add(){
        return view('backEnd.bank.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'bank_name'=>'required',
            'branch_name'=>'required',
            'bank_account'=>'required',
            'opening_balance'=>'required',
            'status'=>'required',
        ]);
        $store_data                 =   new Bank();
        $store_data->bank_name      =   $request->bank_name;
        $store_data->branch_name    =   $request->branch_name;
        $store_data->bank_account   =   $request->bank_account;
        $store_data->opening_balance=   $request->opening_balance;
        $store_data->bank_address   =   $request->bank_address;
        $store_data->note           =   $request->note;
        $store_data->status         =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/bank/manage');
    }
    public function manage(){
        $show_datas = Bank::latest()->get();
        return view('backEnd.bank.manage',compact('show_datas'));
    }
    public function edit($id){
        $salaryheads = Bank::where('status',1)->get();
        $edit_data = Bank::find($id);
        return view('backEnd.bank.edit',compact('edit_data','salaryheads'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'bank_name'=>'required',
            'branch_name'=>'required',
            'bank_account'=>'required',
            'opening_balance'=>'required',
            'status'=>'required',
        ]);
        $update_data = Bank::find($request->hidden_id);
        $update_data->bank_name      =   $request->bank_name;
        $update_data->branch_name    =   $request->branch_name;
        $update_data->bank_account   =   $request->bank_account;
        $update_data->opening_balance=   $request->opening_balance;
        $update_data->bank_address   =   $request->bank_address;
        $update_data->note           =   $request->note;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/bank/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Bank::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/bank/manage');      
    }
    public function active(Request $request){
        $inactive_data = Bank::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/bank/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Bank::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/bank/manage');         
    }
}
