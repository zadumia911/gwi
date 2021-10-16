<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Supplier;
use App\Sale;
use App\PurchaseDetails;
use App\SaleDetails;
use App\Employee;
use App\Product;
use App\Customer;
use App\Import;
use App\Bank;
use Toastr;
use DB;
class SaleController extends Controller
{
    public function add(){
        $bill = Sale::orderBy('id','DESC')->first();
        $bill_no =  $bill?$bill->id+1 : '1';
        $employees = Employee::orderBy('id','DESC')->get();
        $customers = Customer::orderBy('id','DESC')->get();
        $products = PurchaseDetails::orderBy('id','DESC')->get();
        $banks = Bank::orderBy('id','DESC')->get();
        return view('backEnd.sale.add',compact('products','banks','bill_no','employees','customers'));
    }
    public function save(Request $request){
        // $this->validate($request,[
        //     'total_cost'=>'required',
        //     'status'=>'required',
        // ]);
        $store_data                 =   new Sale();
        $store_data->bill           =   $request->bill;
        $store_data->date           =   $request->date;
        $store_data->employee_id    =   $request->employee_id;
        $store_data->customer_id    =   $request->customer_id;
        $store_data->po             =   $request->po;
        $store_data->vat_challan    =   $request->vat_challan;
        $store_data->delivery_address=   $request->delivery_address;
        $store_data->delivery_date  =   $request->delivery_date;
        $store_data->work_order     =   $request->work_order;
        $store_data->total_amount   =   $request->total_amount;
        $store_data->cost_amount    =   $request->cost_amount;
        $store_data->special_discount=   $request->special_discount;
        $store_data->discount       =   $request->discount;
        $store_data->discount_p     =   $request->discount_p;
        $store_data->vat            =   $request->vat;
        $store_data->vatt           =   $request->vatt;
        $store_data->sd             =   $request->sd;
        $store_data->lab_trans      =   $request->lab_trans;
        $store_data->cash_paid      =   $request->cash_paid;
        $store_data->transport_id   =   $request->transport_id;
        $store_data->due            =   $request->due;
        $store_data->payment_method =   $request->payment_method;
        $store_data->bank_id        =   $request->bank_id;
        $store_data->check_num      =   $request->check_num;
        $store_data->check_amount   =   $request->check_amount;
        $store_data->check_appr_date=   $request->check_appr_date;
        $store_data->save();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $data[] = [
                'sale_id'       => $store_data->id,
                'product_id'    => $request->product_id[$i],
                'item_code'     => $request->item_code[$i],
                'sale_price'    => $request->sale_price[$i],
                'cost_price'    => $request->cost_price[$i],
                'total_price'   => $request->total_price[$i],
                'total_cost'    => $request->total_cost[$i],
                'quantity'      => $request->quantity[$i],
                'instock'       => $request->instock[$i],
                'hidden_instock'=> $request->hidden_instock[$i],
            ];
            $stockupdate = Product::find($request->product_id[$i]);
            $stockupdate->stock =  $stockupdate->stock-$request->quantity[$i];
            $stock->save();
            
        }
        SaleDetails::insert($data);

        $customer_info = Customer::find($request->customer_id);
        $customer_info->customer_due = $customer_info->customer_due+$request->due;
        $customer_info->save();

        $customer_info = Product::find($request->customer_id);
        $customer_info->customer_due = $customer_info->customer_due+$request->due;
        $customer_info->save();
        
=======
use App\Sale;
use Toastr;


class SaleController extends Controller
{    
    public function add(){
        return view('backEnd.sale.add');
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
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/purchase/ manage');
    }
    public function manage(){
<<<<<<< HEAD
        $show_datas = Sale::latest()->get();
        return view('backEnd.sale.manage',compact('show_datas'));
    }
=======
        $show_datas = Purchase::latest()->get();
        return view('backEnd.sale.manage',compact('show_datas'));
    }
    public function edit($id){
        $edit_data = Purchase::find($id);
        return view('backEnd.sale.edit',compact('edit_data'));
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

>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
    public function destroy(Request $request){
        $destroy_id = Purchase::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/purchase/ manage');         
    }
<<<<<<< HEAD
    public function report(Request $request){
        if($request->invoice_id==NULL && $request->start_date && $request->end_date){
            $show_datas = Sale::whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date && $request->end_date){
            $show_datas = Sale::where('id',$request->invoice_id)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date==NULL && $request->end_date==NULL){
            $show_datas = Sale::where('id',$request->invoice_id)->latest()->get();
        }else{
            $show_datas = Sale::latest()->get();
        }
        $invoice_id = $request->invoice_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.sale.report',compact('show_datas','invoice_id','start_date','end_date'));
    }
    public function reportinvoice($id){
      $invoice = Sale::with('customer','saledetails','saledetails.product')->find($id);
      return view('backEnd.sale.invoice',compact('invoice'));
    }
=======
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
}
