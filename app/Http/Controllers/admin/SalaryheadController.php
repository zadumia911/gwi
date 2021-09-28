<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salaryhead;
use Toastr;
class SalaryheadController extends Controller
{
    public function add(){
        return view('backEnd.salaryhead.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required',
        ]);

        $store_data              =   new Salaryhead();
        $store_data->title       =   $request->title;
        $store_data->status      =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/salaryhead/manage');
    }
    public function manage(){
        $show_datas = Salaryhead::all();
        return view('backEnd.salaryhead.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Salaryhead::find($id);
        return view('backEnd.salaryhead.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required',
        ]);
        $update_data = Salaryhead::find($request->hidden_id);
        $update_data->title   =   $request->title;
        $update_data->status  =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/salaryhead/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Salaryhead::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/salaryhead/manage');      
    }
    public function active(Request $request){
        $inactive_data = Salaryhead::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/salaryhead/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Salaryhead::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/salaryhead/manage');         
    }
}
