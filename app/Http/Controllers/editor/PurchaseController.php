<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PurchaseDetails;
use App\Purchase;
use App\LocalCost;
use App\Supplier;
use App\Product;
use App\Import;
use App\Bank;
use Toastr;
use Carbon\Carbon;
use DB;

class PurchaseController extends Controller
{    
    public function add(){
        $localcost = LocalCost::orderBy('id','DESC')->get();
        $imports = Import::orderBy('id','DESC')->get();
        $products = Product::orderBy('id','DESC')->get();
        $banks = Bank::orderBy('id','DESC')->get();
        return view('backEnd.purchase.add',compact('localcost','imports','products','banks'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'date'=>'required',
            'type'=>'required',
            'supplier_id'=>'required',
            'po'=>'required',
            'lc'=>'required',
        ]);
        $store_data                 =   new Purchase();
        $store_data->date           =   $request->date;
        $store_data->type           =   $request->type;
        $store_data->supplier_id    =   $request->supplier_id;
        $store_data->po             =   $request->po;
        $store_data->lc             =   $request->lc;
        $store_data->lc_bank        =   $request->lc_bank;
        $store_data->lc_amount      =   $request->lc_amount;
        $store_data->lc_date        =   $request->lc_date;
        $store_data->total_amount   =   $request->total_amount;
        $store_data->chalan_no      =   11;
        $store_data->vat            =   $request->vat;
        $store_data->transport      =   $request->transport;
        $store_data->discount       =   $request->discount;
        $store_data->cash_paid      =   $request->cash_paid;
        $store_data->due            =   $request->due;
        $store_data->payment_method =   $request->payment_method;
        $store_data->bank_id        =   $request->bank_id;
        $store_data->check_num      =   $request->check_num;
        $store_data->check_amount   =   $request->check_amount;
        $store_data->check_appr_date=   $request->check_appr_date;
        $store_data->created_at     =   Carbon::now();
        $store_data->updated_at     =   Carbon::now();
        $store_data->save();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $data[] = [
                'purchase_id'   => $store_data->id,
                'product_id'    => $request->product_id[$i],
                'size'          => $request->size[$i],
                'low_stock'     => $request->low_stock[$i],
                'quantity'      => $request->quantity[$i],
                'hidden_qty'    => $request->hidden_qty[$i],
                'cost_price'    => $request->cost_price[$i],
                'sale_price'    => $request->sale_price[$i],
                'total_price'   => $request->total_price[$i],
                'instock'       => $request->instock[$i],
                'hidden_instock'=> $request->hidden_instock[$i],
                'expire_date'   => $request->expire_date[$i],
                 'created_at'   => Carbon::now(),
                  'updated_at'  => Carbon::now()
            ];
        }
        PurchaseDetails::insert($data);

        $supplier_update = Supplier::find($request->supplier_id);
        $supplier_update->supplier_due = $supplier_update->supplier_due+$request->due;
        $supplier_update->save();

        return response()->json(['status'=>'success']);
    }
    public function manage(){
        $show_datas = Purchase::latest()->get();
        return view('backEnd.purchase.manage',compact('show_datas'));
    }
    public function destroy(Request $request){
        $destroy_id = Purchase::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/purchase/ manage');         
    }
    public function report(Request $request){
        if($request->invoice_id==NULL && $request->start_date && $request->end_date){
            $show_datas = Purchase::whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date && $request->end_date){
            $show_datas = Purchase::where('id',$request->invoice_id)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date==NULL && $request->end_date==NULL){
            $show_datas = Purchase::where('id',$request->invoice_id)->latest()->get();
        }else{
            $show_datas = Purchase::latest()->get();
        }
        $invoice_id = $request->invoice_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.purchase.report',compact('show_datas','invoice_id','start_date','end_date'));
    }
    public function reportinvoice($id){
        $invoice = Purchase::with('supplier','purchasedetails','purchasedetails.product')->find($id);
        return view('backEnd.purchase.invoice',compact('invoice'));
    }
    
}
