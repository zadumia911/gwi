<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Customer;
use Toastr;


class CustomerController extends Controller
{    
    public function add(){
        $employee = Employee::where('status',1)->get();
        return view('backEnd.customer.add', compact('employee'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'employee_id'=>'required',
            'customer_name'=>'required',
            'customer_address'=>'required',
            'customer_phone'=>'required',
            'customer_email'=>'required',
            'customer_web'=>'required',
            'customer_balance'=>'required|numeric',
            'status'=>'required',
        ]);
        $store_data                      =   new Customer();
        $store_data->employee_id         =   $request->employee_id;
        $store_data->customer_name       =   $request->customer_name;
        $store_data->customer_address    =   $request->customer_address;
        $store_data->customer_phone      =   $request->customer_phone;
        $store_data->customer_email      =   $request->customer_email;
        $store_data->customer_web        =   $request->customer_web;
        $store_data->customer_balance    =   $request->customer_balance;
        $store_data->status              =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/customer/manage');
    }
    public function manage(){
        $show_datas = Customer::with('employee')->latest()->get();
        return view('backEnd.customer.manage',compact('show_datas'));
    }
    public function edit($id){
        $employee = Employee::where('status',1)->get();
        $edit_data = Customer::find($id);
        return view('backEnd.customer.edit',compact('edit_data','employee'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'employee_id'=>'required',
            'customer_name'=>'required',
            'customer_address'=>'required',
            'customer_phone'=>'required',
            'customer_email'=>'required',
            'customer_web'=>'required',
            'customer_balance'=>'required',
            'status'=>'required',
        ]);
        $update_data                     =   Customer::find($request->hidden_id);
        $update_data->employee_id        =   $request->employee_id;
        $update_data->customer_name      =   $request->customer_name;
        $update_data->customer_address   =   $request->customer_address;
        $update_data->customer_phone     =   $request->customer_phone;
        $update_data->customer_email     =   $request->customer_email;
        $update_data->customer_web       =   $request->customer_web;
        $update_data->customer_balance   =   $request->customer_balance;
        $update_data->status             =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/customer/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Customer::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/customer/manage');      
    }
    public function active(Request $request){
        $inactive_data = Customer::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/customer/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Customer::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/customer/manage');         
    }
}
