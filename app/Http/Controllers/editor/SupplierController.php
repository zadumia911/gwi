<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use DB;
use Toastr;

class SupplierController extends Controller
{    
    public function supplierfind(Request $request){
        $supplier = DB::table("suppliers")
        ->where("supplier_type",$request->supplier_type)
        ->pluck('supplier_name','id');
        return response()->json($supplier);
    } 
    public function paymentinfo(Request $request){
        $supplier = DB::table("suppliers")
        ->where("id",$request->supplier)
        ->select('supplier_due')
        ->first();
        return response()->json($supplier);
    }
    public function add(){
        return view('backEnd.supplier.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'supplier_type'=>'required',
            'supplier_name'=>'required',
            'supplier_address'=>'required',
            'supplier_phone'=>'required',
            'supplier_email'=>'required',
            'supplier_web'=>'required',
            'supplier_balance'=>'required|numeric',
            'status'=>'required',
        ]);
        $store_data                      =   new Supplier();
        $store_data->supplier_type       =   $request->supplier_type;
        $store_data->supplier_name       =   $request->supplier_name;
        $store_data->supplier_address    =   $request->supplier_address;
        $store_data->supplier_phone      =   $request->supplier_phone;
        $store_data->supplier_email      =   $request->supplier_email;
        $store_data->supplier_web        =   $request->supplier_web;
        $store_data->supplier_balance    =   $request->supplier_balance;
        $store_data->status              =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/supplier/manage');
    }
    public function manage(){
        $show_datas = Supplier::latest()->get();
        return view('backEnd.supplier.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Supplier::find($id);
        return view('backEnd.supplier.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'supplier_type'=>'required',
            'supplier_name'=>'required',
            'supplier_address'=>'required',
            'supplier_phone'=>'required',
            'supplier_email'=>'required',
            'supplier_web'=>'required',
            'supplier_balance'=>'required',
            'status'=>'required',
        ]);

        $update_data                     =   Supplier::find($request->hidden_id);
        $update_data->supplier_type      =   $request->supplier_type;
        $update_data->supplier_name      =   $request->supplier_name;
        $update_data->supplier_address   =   $request->supplier_address;
        $update_data->supplier_phone     =   $request->supplier_phone;
        $update_data->supplier_email     =   $request->supplier_email;
        $update_data->supplier_web       =   $request->supplier_web;
        $update_data->supplier_balance   =   $request->supplier_balance;
        $update_data->status             =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/supplier/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Supplier::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/supplier/manage');      
    }
    public function active(Request $request){
        $inactive_data = Supplier::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/supplier/manage');        
    }
    public function destroy(Request $request){
        $destroy_id = Supplier::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/supplier/manage');         
    }
    public function duelist(){
        $show_datas = Supplier::whereNotNull('supplier_due')->get();;
        return view('backEnd.supplier.duelist',compact('show_datas'));       
    }
    public function history(){
        $show_datas = Supplier::whereNotNull('supplier_due')->get();;
        return view('backEnd.supplier.duelist',compact('show_datas'));       
    }
}