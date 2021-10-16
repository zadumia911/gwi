<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SupplierPayment;
use App\Supplier;
use App\Bank;
use Toastr;
class SupplierPaymentController extends Controller
{
    public function add(){
        $supplier = Supplier::where('status',1)->get();
        $banks = Bank::where('status',1)->get();
        return view('backEnd.supplier.payadd',compact('supplier','banks'));         
    }
    public function save(Request $request){
        $this->validate($request,[
            'supplier_id'=>'required',
            'previous_balance'=>'required',
            'payment_method'=>'required',
            'paid'=>'required',
            'balance'=>'required',
            'date'=>'required',
        ]);
        $store_data                      =   new SupplierPayment();
        $store_data->supplier_id         =   $request->supplier_id;
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

        $supplier_update = Supplier::find($request->supplier_id);
        $supplier_update->supplier_due = $request->balance;
        $supplier_update->save();

        return response()->json(['status'=>'success']);
    }
    public function manage(){
        $show_datas = SupplierPayment::with('supplier','bank')->get();
        return view('backEnd.supplier.paymanage',compact('show_datas'));
    }
    public function report(Request $request){
        if($request->start_date && $request->end_date){
          $show_datas = SupplierPayment::whereBetween('created_at',[$request->start_date,$request->end_date])->with('supplier','bank')->get();
        }else{
            $show_datas = SupplierPayment::with('supplier','bank')->get();
        }
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.supplier.payreport',compact('show_datas','start_date','end_date'));
    }
    public function active(Request $request){
        $active_data = SupplierPayment::find($request->hidden_id);
        $active_data->status=1;
        $active_data->save();
        Toastr::success('success!!', 'Data active successfully');
        return redirect('/admin/supplier/payment/manage');        
    }

    public function destroy(Request $request){
        $destroy_id = SupplierPayment::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/admin/supplier/payment/manage');          
    }
}
