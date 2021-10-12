<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Import;
use App\ImportDetails;
use App\LocalCost;
use App\Product;
use Toastr;

class ImportController extends Controller
{    
    public function add(){
        $localcost = LocalCost::get();
        $product = Product::where('status',1)->get();
        return view('backEnd.import.add',compact('localcost','product'));
    }
    public function save(Request $request){
        $this->validate($request,[
            'import_date'=>'required',
            'po_number'=>'required',
            'lc_no'=>'required',
            'usd_rate'=>'required',
            'sgd_rate'=>'required',
            'local_cost'=>'required',
            'quantity'=>'required',
        ]);
        $store_data               =   new Import();
        $store_data->import_date  =   $request->import_date;
        $store_data->po_number    =   $request->po_number;
        $store_data->lc_no        =   $request->lc_no;
        $store_data->lc_no        =   $request->lc_no;
        $store_data->usd_rate     =   $request->usd_rate;
        $store_data->sgd_rate     =   $request->sgd_rate;
        $store_data->local_cost   =   $request->local_cost;
        $store_data->quantity     =   $request->total_quantity;
        $store_data->save();

        for ($i = 0; $i < count($request->hs); $i++) {
            $data[] = [
                'import_id'   => $store_data->id,
                'hs'          => $request->hs[$i],
                'item_id'     => $request->item_id[$i],
                'duty_assign' => $request->duty_assign[$i],
                'duty_p'      => $request->duty_p[$i],
                'cost_price'  => $request->cost_price[$i],
                'sale_price'  => $request->sale_price[$i],
                'quantity'    => $request->quantity[$i],
                'cartoon'     => $request->cartoon[$i],
                'currency'    => $request->currency[$i],
                'pack'        => $request->pack[$i],
                'size'        => $request->size[$i],
                'ppp'         => $request->ppp[$i],
                'margin'      => $request->margin[$i]
            ];
        }
        ImportDetails::insert($data);
        Toastr::success('success!!', 'Data insert successfully');
        return redirect('editor/import/manage');
    }
    public function manage(){
        $show_datas = Import::latest()->get();
        return view('backEnd.import.manage',compact('show_datas'));
    }
    public function report(Request $request){
        if($request->invoice_id==NULL && $request->start_date && $request->end_date){
            $show_datas = Import::whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date && $request->end_date){
            $show_datas = Import::where('id',$request->invoice_id)->whereBetween('created_at',[$request->start_date,$request->end_date])->latest()->get();
        }elseif($request->invoice_id && $request->start_date==NULL && $request->end_date==NULL){
            $show_datas = Import::where('id',$request->invoice_id)->latest()->get();
        }else{
            $show_datas = Import::latest()->get();
        }
        $invoice_id = $request->invoice_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return view('backEnd.import.report',compact('show_datas','invoice_id','start_date','end_date'));
    }
    public function reportinvoice($id){
        $invoice = Import::with('importdetails','importdetails.product')->find($id);
        return view('backEnd.import.invoice',compact('invoice'));
    }

    public function destroy(Request $request){
        $destroy_id = Import::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/import/manage');         
    }
}
