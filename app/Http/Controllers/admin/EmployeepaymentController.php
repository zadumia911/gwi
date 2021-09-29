<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeepayment;
use Toastr;
class EmployeepaymentController extends Controller
{
    
    public function add(){
        return view('backEnd.employeepayment.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'employee_id'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);
        $store_data                 =   new Employeepayment();
        $store_data->date           =   $request->date;
        $store_data->employee_id    =   $request->employee_id;
        $store_data->amount         =   $request->amount;
        $store_data->note           =   $request->note;
        $store_data->status         =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/employee-payment/manage');
    }
    public function manage(){
        $show_datas = Employeepayment::with('employee')->latest()->get();
        return view('backEnd.employeepayment.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Employeepayment::find($id);
        return view('backEnd.employeepayment.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'employee_id'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);
        $update_data = Employeepayment::find($request->hidden_id);
        $update_data->date           =   $request->date;
        $update_data->employee_id    =   $request->employee_id;
        $update_data->amount         =   $request->amount;
        $update_data->note           =   $request->note;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/employee-payment/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Employeepayment::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/employee-payment/manage');      
    }
    public function active(Request $request){
        $inactive_data = Employeepayment::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/employee-payment/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Employeepayment::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/employee-payment/manage');         
    }
}
