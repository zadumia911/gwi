<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use File;
use Toastr;
class EmployeeController extends Controller
{
     public function add(){
        $last_employee = Employee::orderBy('id','DESC')->first();
        if($last_employee!=null){
            if($last_employee->id > 10){
                $code = $last_employee->id + 1;
                $employee_code = 'E-'.$code;
            }else{
               $code = $last_employee->id + 1;
               $employee_code = 'E-0'.$code;
            }
        }else{
            $employee_code =  'E-01';
        }
        return view('backEnd.employee.add',compact('employee_code'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'salary'=>'required',
            'image'=>'required',
            'status'=>'required',
        ]);

        $last_employee = Employee::orderBy('id','DESC')->first();
        if($last_employee!=null){
            if($last_employee->id > 10){
                $code = $last_employee->id + 1;
                $employee_code = 'E-'.$code;
            }else{
               $code = $last_employee->id + 1;
               $employee_code = 'E-0'.$code;
            }
        }else{
            $employee_code =  'E-01';
        }

        // image upload
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $uploadPath = 'public/uploads/companyinfo/';
        $file->move($uploadPath,$name);
        $fileUrl =$uploadPath.$name;

        $store_data                 =   new Employee();
        $store_data->name           =   $request->name;
        $store_data->employee_code  =   $employee_code;
        $store_data->father_name    =   $request->father_name;
        $store_data->mother_name    =   $request->mother_name;
        $store_data->address        =   $request->address;
        $store_data->phone          =   $request->phone;
        $store_data->designation    =   $request->designation;
        $store_data->department     =   $request->department;
        $store_data->join_date      =   $request->join_date;
        $store_data->salary         =   $request->salary;
        $store_data->image          =   $fileUrl;
        $store_data->status         =   $request->status;
        $store_data->save();

        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/employee/manage');
    }
    public function manage(){
        $show_datas = Employee::get();
        return view('backEnd.employee.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Employee::find($id);
        return view('backEnd.employee.edit',compact('edit_data'));
    }
    public function update(Request $request){
       $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'salary'=>'required',
            'status'=>'required',
        ]);
        $update_data = Employee::find($request->hidden_id);
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

        $update_data->name           =   $request->name;
        $update_data->father_name    =   $request->father_name;
        $update_data->mother_name    =   $request->mother_name;
        $update_data->address        =   $request->address;
        $update_data->phone          =   $request->phone;
        $update_data->designation    =   $request->designation;
        $update_data->department     =   $request->department;
        $update_data->join_date      =   $request->join_date;
        $update_data->salary         =   $request->salary;
        $update_data->image          =   $fileUrl;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/employee/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Employee::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/employee/manage');      
    }
    public function active(Request $request){
        $inactive_data = Employee::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/employee/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Employee::find($request->hidden_id);
        File::delete(public_path() . 'public/uploads/brand', $destroy_id->image);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/employee/manage');         
    }
}
