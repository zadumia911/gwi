<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CF;
use Toastr;

class CFController extends Controller
{    
    public function add(){
        return view('backEnd.cf.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'cf_name'=>'required',
            'cf_address'=>'required',
            'cf_phone'=>'required',
            'cf_date'=>'required',
            'status'=>'required',
        ]);

        $store_data                 =   new CF();
        $store_data->cf_name        =   $request->cf_name;
        $store_data->cf_address    =   $request->cf_address;
        $store_data->cf_phone       =   $request->cf_phone;
        $store_data->cf_date       =   $request->cf_date;
        $store_data->status         =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/cnf/manage');
    }
    public function manage(){
        $show_datas = CF::latest()->get();     
        return view('backEnd.cf.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = CF::find($id);
        return view('backEnd.cf.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'cf_name'=>'required',
            'cf_address'=>'required',
            'cf_phone'=>'required',
            'cf_date'=>'required',
            'status'=>'required',
        ]);
        $update_data                 =   CF::find($request->hidden_id);
        $update_data->cf_name        =   $request->cf_name;
        $update_data->cf_address     =   $request->cf_address;
        $update_data->cf_phone       =   $request->cf_phone;
        $update_data->cf_date        =   $request->cf_date;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/cnf/manage');
    }
    public function inactive(Request $request){
        $inactive_data = CF::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/cnf/manage');      
    }
    public function active(Request $request){
        $inactive_data = CF::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/cnf/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = CF::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/cnf/manage');         
    }
}