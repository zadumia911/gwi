<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purchase;
use Toastr;

class PurchaseController extends Controller
{    
    public function add(){
        return view('backEnd.purchase.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'local_cost_head'=>'required',
            'status'=>'required',
        ]);
        $store_data                   =   new Purchase();
        $store_data->local_cost_head  =   $request->local_cost_head;
        $store_data->slug             =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $store_data->status           =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/purchase/ manage');
    }
    public function manage(){
        $show_datas = Purchase::latest()->get();
        return view('backEnd.purchase.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Purchase::find($id);
        return view('backEnd.purchase.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'local_cost_head'=>'required',
            'status'=>'required',
        ]);
        $update_data                    =   Purchase::find($request->hidden_id);
        $update_data->local_cost_head   =   $request->local_cost_head;
        $update_data->slug              =   strtolower(preg_replace('/\s+/u', '-', trim($request->name)));
        $update_data->status            =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('editor/purchase/ manage');
    }
    public function inactive(Request $request){
        $inactive_data = Purchase::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/editor/purchase/ manage');      
    }
    public function active(Request $request){
        $inactive_data = Purchase::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/editor/purchase/ manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Purchase::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/purchase/ manage');         
    }
}
