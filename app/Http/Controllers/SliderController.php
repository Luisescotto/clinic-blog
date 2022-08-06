<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request, Slider $slider)
    {
        $slider->my_store($request);
        return redirect()->route('sliders.index');
    }

    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $slider->my_update($request);
        return redirect()->route('sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index');
    }
}
