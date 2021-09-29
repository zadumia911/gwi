<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salaryhead;
use App\Employee;
use App\Salary;
use Toastr;
class SalaryController extends Controller
{
    public function add(){
        $salaryheads = Salaryhead::where('status',1)->get();
        return view('backEnd.salary.add',compact('salaryheads'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'employee_id'=>'required',
            'amount'=>'required',
            'salaryhead_id'=>'required',
            'status'=>'required',
        ]);
        $employee = Employee::find($request->employee_id);
        $store_data                 =   new Salary();
        $store_data->date           =   $request->date;
        $store_data->employee_id    =   $request->employee_id;
        $store_data->amount         =   $request->amount;
        $store_data->salary         =   $employee->salary;
        $store_data->salaryhead_id  =   $request->salaryhead_id;
        $store_data->note           =   $request->note;
        $store_data->status         =   $request->status;
        $store_data->save();
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/salary/manage');
    }
    public function manage(){
        $show_datas = Salary::with('employee')->latest()->get();
        return view('backEnd.salary.manage',compact('show_datas'));
    }
    public function edit($id){
        $salaryheads = Salaryhead::where('status',1)->get();
        $edit_data = Salary::find($id);
        return view('backEnd.salary.edit',compact('edit_data','salaryheads'));
    }
    public function update(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'employee_id'=>'required',
            'amount'=>'required',
            'salaryhead_id'=>'required',
            'status'=>'required',
        ]);
        $update_data = Salary::find($request->hidden_id);
        $update_data->date           =   $request->date;
        $update_data->employee_id    =   $request->employee_id;
        $update_data->amount         =   $request->amount;
        $update_data->salaryhead_id  =   $request->salaryhead_id;
        $update_data->note           =   $request->note;
        $update_data->status         =   $request->status;
        $update_data->save();
        Toastr::success('success!!', 'Data update successfully');
        return redirect('admin/salary/manage');
    }
    public function inactive(Request $request){
        $inactive_data = Salary::find($request->hidden_id);
        $inactive_data->status=0;
        $inactive_data->save();
        Toastr::success('success!!', 'Data inactive successfully');
        return redirect('/admin/salary/manage');      
    }
    public function active(Request $request){
        $inactive_data = Salary::find($request->hidden_id);
        $inactive_data->status=1;
        $inactive_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/salary/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = Salary::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/salary/manage');         
    }
}
