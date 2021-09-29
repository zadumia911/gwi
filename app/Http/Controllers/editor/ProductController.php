<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;
use Toastr;

class ProductController extends Controller
{    
    public function add(){
        $brand = Brand::where('status',1)->get();
        $category = Category::where('status',1)->get();
        return view('backEnd.product.add',compact('brand','category'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            'pro_name'=>'required',
            'status'=>'required',
        ]);

        $store_data                 =   new Product();
        $store_data->barcode        =   $request->barcode;
        $store_data->category_id    =   $request->category_id;
        $store_data->brand_id       =   $request->brand_id;
        $store_data->pro_name       =   $request->pro_name;
        $store_data->pack_size      =   $request->pack_size;
        $store_data->status         =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/product/manage');
    }
    public function manage(){
        $show_datas = Product::with('category','brand')->latest()->get();
        return view('backEnd.product.manage',compact('show_datas'));
    }
    public function edit($id){
        $brand = Brand::where('status',1)->get();
        $category = Category::where('status',1)->get();
        $edit_data = Product::find($id);
        return view('backEnd.product.edit',compact('edit_data','brand','category'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            'pro_name'=>'required',
            'status'=>'required',
        ]);
        $update_data                 =   Product::find($request->hidden_id);
        $update_data->barcode        =   $request->barcode;
        $update_data->category_id    =   $request->category_id;
        $update_data->brand_id       =   $request->brand_id;
        $update_data->pro_name       =   $request->pro_name;
        $update_data->pack_size      =   $request->pack_size;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/product/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Product::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/product/manage');      
    }
    public function active(Request $request){
        $inactive_data = Product::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/product/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Product::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/product/manage');         
    }
}