<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Toastr;

class BrandController extends Controller
{
    
    public function add(){
        return view('backEnd.brand.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'brand_name'=>'required',
            'status'=>'required',
        ]);
        $store_data                   =   new Brand();
        $store_data->brand_name       =   $request->brand_name;
        $store_data->slug             =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $store_data->status           =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/brand/manage');
    }
    public function manage(){
        $show_datas = Brand::latest()->get();
        return view('backEnd.brand.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Brand::find($id);
        return view('backEnd.brand.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'brand_name'=>'required',
            'status'=>'required',
        ]);
        $update_data                    =   Brand::find($request->hidden_id);
        $update_data->brand_name        =   $request->brand_name;
        $update_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $update_data->status            =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/brand/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Brand::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/brand/manage');      
    }
    public function active(Request $request){
        $inactive_data = Brand::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/brand/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Brand::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/brand/manage');         
    }
}
