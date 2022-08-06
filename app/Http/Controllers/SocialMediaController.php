<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $social_medias = SocialMedia::get();
        return view('admin.social_media.index', compact('social_medias'));
    }

    public function create()
    {
        return view('admin.social_media.create');
    }

    public function store(Request $request, SocialMedia $social_media)
    {
        $social_media->my_store($request);
        session()->flash('exito', 'Red social registrada correctamente');
        return redirect()->route('social_medias.index');
    }

    public function show(SocialMedia $social_media)
    {
        return view('admin.social_media.show', compact('social_media'));
    }

    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.edit', compact('social_media'));
    }

    public function update(Request $request, SocialMedia $social_media)
    {
        $social_media->my_update($request);
        return redirect()->route('social_medias.index');
    }

    public function destroy(SocialMedia $social_media)
    {
        $social_media->delete();
        return redirect()->route('social_medias.index');
    }
}
