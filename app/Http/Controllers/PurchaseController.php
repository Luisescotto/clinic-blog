<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;

use Barryvdh\DomPDF\Facade as PDF;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $providers = Provider::get();
        $products = Product::store_products()->get();
        return view('admin.purchase.create', compact('providers', 'products'));

    }

    public function store(StoreRequest $request)
    {
        //dd($request);   
        $purchase = Purchase::create($request->all()+[
            'user_id' => Auth::user()->id,    
            'purchase_date' =>Carbon::now('America/Santo_Domingo'),    
        ]);


        foreach ($request->product_id as $key => $id){
            $purchase->update_stock($request->product_id[$key], $request->quantity[$key]);
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }

        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;

        foreach($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
         }

        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    public function edit(Purchase $purchase)
    {
        // $provider = Provider::get();
        // return view('admin.purchase.edit', compact('purchase', 'provider'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;

        foreach($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
         }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase','subtotal','purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'. $purchase->id .'.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {
        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'Valid') {
            $purchase->update(['status'=>'Canceled']);
            return redirect()->back();
        } else {
            $purchase->update(['status'=>'Valid']);
            return redirect()->back();
        } 
    }

}
