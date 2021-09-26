<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toastr;
use App\Companyinfo;

class CompanyinfoController extends Controller
{
    public function add(){
        return view('backEnd.companyinfo.add');
    }
    public function save(Request $request){
        $this->validate($request,[
            'branch_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'image'=>'required',
        ]);

        // image upload
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $uploadPath = 'public/uploads/companyinfo/';
        $file->move($uploadPath,$name);
        $fileUrl =$uploadPath.$name;

        $store_data                 =   new Companyinfo();
        $store_data->branch_name    =   $request->branch_name;
        $store_data->address        =   $request->address;
        $store_data->phone          =   $request->phone;
        $store_data->image          =   $fileUrl;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('superadmin/companyinfo/manage');
    }
    public function manage(){
        $show_datas = Companyinfo::all();
        return view('backEnd.companyinfo.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Companyinfo::find($id);
        return view('backEnd.companyinfo.edit',compact('edit_data'));
    }
    public function update(Request $request){
        $update_data = Companyinfo::find($request->hidden_id);

        $update_file = $request->file('image');
        if ($update_file) {
            $name = $update_file->getClientOriginalName();
            File::delete(public_path() . 'public/uploads/companyinfo', $update_data->image);
            $uploadPath = 'public/uploads/companyinfo/';
            $update_file->move($uploadPath,$name);
            $fileUrl =$uploadPath.$name;
        }else{
            $fileUrl = $update_data->image;
        }

        $update_data->branch_name   =   $request->branch_name;
        $update_data->address       =   $request->address;
        $update_data->phone         =   $request->phone;
        $update_data->image         =   $fileUrl;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('superadmin/companyinfo/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Companyinfo::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/superadmin/companyinfo/manage');      
    }
    public function active(Request $request){
        $inactive_data = Companyinfo::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/superadmin/companyinfo/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Companyinfo::find($request->hidden_id);
        File::delete(public_path() . 'public/uploads/brand', $destroy_id->image);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/superadmin/companyinfo/manage');         
    }

}
