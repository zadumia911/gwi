<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PurchaseDetails;
use App\Product;
use DB;
class ReportsController extends Controller
{
    public function stock(){
        $show_datas = PurchaseDetails::whereNotNull('instock')->with('product')->get();
        return view('backEnd.reports.stock',compact('show_datas'));
    }
    public function stockledger(Request $request){
        if($request->product_id){
           $show_datas = DB::table('products')
            ->join('purchase_details', 'products.id', '=', 'purchase_details.product_id')
            ->join('sale_details', 'products.id', '=', 'sale_details.product_id')
            ->select('products.*', 'purchase_details.*', 'sale_details.*')
            ->where('products.id',$request->product_id)
            ->get(); 

            return $show_datas;
        }
        $products = Product::where('status',1)->get();
        return view('backEnd.reports.stclegder',compact('products'));
    }
}
