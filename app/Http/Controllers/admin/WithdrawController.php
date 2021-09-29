<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Withdraw;
use App\Bank;
use Toastr;
class WithdrawController extends Controller
{
    
    public function add(){
        $banks = Bank::where('status',1)->get();
        return view('backEnd.withdraw.add',compact('banks'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'bank_id'=>'required',
            'cheque_number'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);
        $store_data                =   new Withdraw();
        $store_data->bank_id       =   $request->bank_id;
        $store_data->cheque_number =   $request->cheque_number;
        $store_data->amount        =   $request->amount;
        $store_data->note          =   $request->note;
        $store_data->status        =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/withdraw/manage');
    }
    public function manage(){
        $show_datas = Withdraw::latest()->get();
        return view('backEnd.withdraw.manage',compact('show_datas'));
    }
    public function edit($id){
        $banks = Bank::where('status',1)->get();
        $edit_data = Withdraw::find($id);
        return view('backEnd.withdraw.edit',compact('edit_data','banks'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'bank_id'=>'required',
            'cheque_number'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);
        $update_data = Withdraw::find($request->hidden_id);
        $update_data->bank_id      =   $request->bank_id;
        $update_data->cheque_number=   $request->cheque_number;
        $update_data->amount       =   $request->amount;
        $update_data->note         =   $request->note;
        $update_data->status       =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/withdraw/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Withdraw::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/withdraw/manage');      
    }
    public function active(Request $request){
        $inactive_data = Withdraw::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/withdraw/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Withdraw::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/withdraw/manage');         
    }
}
