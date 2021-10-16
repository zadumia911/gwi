<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerCollection;
use App\Customer;
use App\Bank;
use Toastr;
class CustomerCollectionController extends Controller
{
    public function colladd(){
        $customers = Customer::where('status',1)->get();
        $banks = Bank::where('status',1)->get();
        return view('backEnd.customer.colladd',compact('customers','banks'));         
    }
    public function collsave(Request $request){
        $this->validate($request,[
            'customer_id'=>'required',
            'previous_balance'=>'required',
            'payment_method'=>'required',
            'paid'=>'required',
            'balance'=>'required',
            'date'=>'required',
        ]);
        $store_data                      =   new CustomerCollection();
        $store_data->customer_id         =   $request->customer_id;
        $store_data->previous_balance    =   $request->previous_balance;
        $store_data->payment_method      =   $request->payment_method;
        $store_data->bank_id             =   $request->bank_id;
        $store_data->bank_amount         =   $request->bank_amount;
        $store_data->check_num           =   $request->check_num;
        $store_data->check_amount        =   $request->check_amount;
        $store_data->check_appr_date     =   $request->check_appr_date;
        $store_data->paid                =   $request->paid;
        $store_data->balance             =   $request->balance;
        $store_data->date                =   $request->date;
        $store_data->save();

        $customer_update = Customer::find($request->customer_id);
        $customer_update->customer_due = $request->balance;
        $customer_update->save();

        Toastr::success('success!!', 'Data insert successfully');
        return redirect('admin/customer/collection/manage');
    }
    public function collmanage(){
        $show_datas = CustomerCollection::with('customer','bank')->get();
        return view('backEnd.customer.collmanage',compact('show_datas'));
    }
    public function collreport(Request $request){
        if($request->start_date && $request->end_date){
          $show_datas = CustomerCollection::whereBetween('created_at',[$request->start_date,$request->end_date])->with('customer','bank')->get();
        }else{
            $show_datas = CustomerCollection::with('customer','bank')->get();
        }
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.customer.collreport',compact('show_datas','start_date','end_date'));
    }
    public function collactive(Request $request){
        $active_data = CustomerCollection::find($request->hidden_id);
        $active_data->status=1;
        $active_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/customer/collection/manage');        
    }

    public function colldestroy(Request $request){
        $destroy_id = CustomerCollection::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/customer/collection/manage');          
    }
}
