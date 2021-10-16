<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerCollection;
use App\SupplierPayment;
use App\DailyExpense;
use App\SaleDetails;
use App\Customer;
use App\Purchase;
use App\Supplier;
use App\Product;
use App\Sale;
class DashboardController extends Controller
{
    public function index(){
        $netsale = Sale::sum('total_amount');
        $cost_amount = Sale::sum('cost_amount');
        $saledue = Sale::sum('due');
        $purchase = Purchase::sum('total_amount');
        $purchase_due = Purchase::sum('due');
        $cash_collection = CustomerCollection::where('payment_method','Cash')->sum('paid');
        $bank_collection = CustomerCollection::where('payment_method','!=','Cash')->sum('paid');
        $cash_payment = SupplierPayment::where('payment_method','Cash')->sum('paid');
        $bank_payment = SupplierPayment::where('payment_method','!=','Cash')->sum('paid');
        $expence = DailyExpense::sum('expense_amount');
        $cash_hand = Sale::sum('cash_paid');
        $supplier_due = Supplier::sum('supplier_due');
        $total_supplier = Supplier::count();
        $customer_due = Customer::sum('customer_due');
        $total_customer = Supplier::count();
        $product_out = SaleDetails::sum('instock');
        $total_stock = Product::sum('stock');
        $sale_price = Sale::sum('cash_paid');
        return view('backEnd.dashboard.dashboard',compact('netsale','saledue','purchase','purchase_due','cash_collection','bank_collection','cash_payment','bank_payment','expence','cash_hand','cost_amount','supplier_due','total_supplier','customer_due','total_customer','product_out','total_stock','sale_price'));
    }
}
