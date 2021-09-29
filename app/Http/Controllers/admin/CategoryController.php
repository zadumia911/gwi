<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Toastr;

class CategoryController extends Controller
{
    
    public function add(){
        return view('backEnd.category.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'status'=>'required',
        ]);
        $store_data                   =   new Category();
        $store_data->category_name    =   $request->category_name;
        $store_data->slug             =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $store_data->status           =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/category/manage');
    }
    public function manage(){
        $show_datas = Category::latest()->get();
        return view('backEnd.category.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Category::find($id);
        return view('backEnd.category.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'status'=>'required',
        ]);
        $update_data                    = Category::find($request->hidden_id);
        $update_data->category_name     =   $request->category_name;
        $update_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $update_data->status            =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/category/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Category::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/category/manage');      
    }
    public function active(Request $request){
        $inactive_data = Category::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/category/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Category::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/category/manage');         
    }
}