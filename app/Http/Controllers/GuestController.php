<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;
use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::get();
        return view('admin.guest.index', compact('guests'));
    }

    public function create()
    {
        return view('admin.guest.create');
    }

    public function store(StoreRequest $request)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
        }

        $guest = Guest::create($request->all()+[
                'image' => $image_name
            ]);

        return redirect()->route('guests.index');
    }

    public function show(Guest $guest)
    {
        //'name', 'description', 'image',
        return view('admin.guest.show', compact('guest'));
    }

    public function edit(Guest $guest)
    {
        return view('admin.guest.edit');
    }

    public function update(UpdateRequest $request, Guest $guest)
    {
        $guest->update($request->all());
        return redirect()->route('guests.index');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('guests.index');
    }
}
