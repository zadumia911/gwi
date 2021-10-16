<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LocalCost;
use App\LocalCostHead;
use App\LocalCostDetails;
use App\Destination;
use App\Bank;
use App\CF;
use Toastr;
use DB;

class LocalCostController extends Controller
{    

    public function add(){
        $cfagents = CF::where('status',1)->latest()->get();
        $banks = Bank::where('status',1)->latest()->get();
        $lcosthead = LocalCostHead::where('status',1)->latest()->get();
        $destination = Destination::where('status',1)->latest()->get();
        $localcost = LocalCost::orderBy('id','DESC')->first();
        $gw_po =  'GW-PO-'.str_pad($localcost?$localcost->id+1 : '1',4,'0', STR_PAD_LEFT);
        return view('backEnd.localcost.add',compact('cfagents','banks','lcosthead','destination','gw_po'));
    }
    public function save(Request $request){
        $store_data                   =   new LocalCost();
        $store_data->receive_date     =   $request->receive_date;
        $store_data->cost_type        =   $request->cost_type;
        $store_data->supplier_id      =   $request->supplier_id;
        $store_data->cf_agent         =   $request->cf_agent;
        $store_data->shipping_port    =   $request->shipping_port;
        $store_data->destination_id   =   $request->destination_id;
        $store_data->lc_number        =   $request->lc_number;
        $store_data->lc_date          =   $request->lc_date;
        $store_data->lc_amount        =   $request->lc_amount;
        $store_data->lc_cost          =   array_sum($request->amount);
        $store_data->bank_id          =   $request->bank_id;
        $store_data->container_receive=   $request->container_receive;
        $store_data->gw_po            =   $request->gw_po;
        $store_data->supplier_invoice =   $request->supplier_invoice;
        $store_data->save();
        
       for ($i = 0; $i < count($request->head_id); $i++) {
            $data[] = [
                'cost_id'     => $store_data->id,
                'costhead_id' => $request->head_id[$i],
                'amount'      => $request->amount[$i],
                'comment'     => $request->comment[$i]
            ];
        }
        return response()->json(['status'=>'success']);
    }
    public function manage(){
        $show_datas = LocalCost::latest()->get();
        return view('backEnd.localcost.manage',compact('show_datas'));
    }
    public function report(){
        $show_datas = LocalCost::latest()->get();
        return view('backEnd.localcost.report',compact('show_datas'));
    }
    public function destroy(Request $request){
        $destroy_id = LocalCost::find($request->hidden_id);
        $destroy_id->delete();
        Toastr::success('success!!', 'Data delete successfully');
        return redirect('/editor/localcost/manage');         
    }
    public function lcost(Request $request){
        $data = LocalCost::where('gw_po',$request->id)->first();
        return response()->json(['lc_cost'=>$data->lc_cost,'lc_no'=>$data->lc_number]);
    }
    public function localcost(Request $request){
        $res = LocalCost::where('gw_po',$request->gw_po)->first();
        return response()->json(['lc_no'=>$res->lc_number]);
    }
}
