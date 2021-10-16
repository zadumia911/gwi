<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerCollection;

class CustomerCollectionController extends Controller
{    
    public function add(){
        return view('backEnd.collection.add');
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
        $store_data                      =   new CustomerCollection();
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
        return redirect('editor/collection/manage');
    }
    public function manage(){
        $show_datas = CustomerCollection::latest()->get();
        return view('backEnd.collection.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = CustomerCollection::find($id);
        return view('backEnd.collection.edit',compact('edit_data'));
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
        $update_data                     =   CustomerCollection::find($request->hidden_id);
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
        return redirect('editor/collection/manage');
    }
    public function inactive(Request $request){
        $inactive_data = CustomerCollection::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/collection/manage');      
    }
    public function active(Request $request){
        $inactive_data = CustomerCollection::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/collection/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = CustomerCollection::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/collection/manage');         
    }
}
