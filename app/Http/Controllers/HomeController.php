<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Purchase;
use App\Sale;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="Valid" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="Valid" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');


        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="Valid" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="Valid" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        // $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, count(*) as totaldia from sales v where v.status="Valid" group by v.sale_date order by day(v.sale_date) desc limit 15');
        

        // Pending
        // Approved
        // Delivered
        // Cancelled

        $comprasmes= Purchase::orderBy('purchase_date', 'ASC')->where('status', 'Valid')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(purchase_date, '%M %Y') as mes"),
            DB::raw("SUM(total) as totalmes"),
        )->groupBy('mes')->take(30)->get();

        $ventasmes= Sale::orderBy('sale_date', 'ASC')->where('status', 'Valid')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(sale_date, '%M %Y') as mes"),
            DB::raw("SUM(total) as totalmes"),
        )->groupBy('mes')->take(30)->get();

        $order_mes= Order::select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status"),
        )->groupBy('status')->get();

        $order_dia= Order::where('order_date', Carbon::now()->format('Y-m-d'))->take(5)->get();

        $order_dia_status= Order::where('order_date', Carbon::now()->format('Y-m-d'))->select(
            DB::raw("count(*) as count"),
            DB::raw("shipping_status as status"),
        )->groupBy('status')->get();

        $ventasdia= Sale::orderBy('sale_date', 'ASC')->where('status', 'Valid')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(sale_date, '%D %M %Y') as date"),
            DB::raw("SUM(total) as total"),
        )->groupBy('date')->take(30)->get();
        
        $totales=DB::select('SELECT 
        (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="Valid") as totalcompra, 
        (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="Valid") as totalventa,
        (select ifnull(v.sale_date,0) from sales v where DATE(v.sale_date)=curdate() and v.status="Valid") as fechaventa,
        (select ifnull(c.purchase_date,0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="Valid") as fechacompra');

        foreach ($totales as $total) {
             $sale_date = $total->fechaventa;
             $purchase_date = $total->fechacompra;
        }
        
        

        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="Valid" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');

        $most_ordered_products = OrderDetail::select(
            DB::raw("SUM(quantity) as total"),
            DB::raw("product_id as product_id"),
        )->groupBy('product_id')->take(10)->get();
       
        return view('home', compact('comprasmes', 'ventasmes', 'sale_date', 'purchase_date', 'ventasdia', 'totales', 'productosvendidos', 'order_mes', 'most_ordered_products', 'order_dia', 'order_dia_status'));
    }
}
