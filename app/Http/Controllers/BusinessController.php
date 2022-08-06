<?php

namespace App\Http\Controllers;

use App\Http\Requests\Business\UpdateRequest;
use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function index(){
        $business = Business::where('id', 1)->firstOrFail();
        return view('admin.business.index', compact('business'));
    }
    public function update(UpdateRequest $request, Business $business)
    {
        $business->my_update($request);

        return redirect()->route('business.index');
    }
}
