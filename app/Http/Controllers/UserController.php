<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use App\Qr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));

    }

    
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        $qr = Qr::create([
        'name' => $user->name,
        'url' => route('paid.seminars', $user),
        'user_id' => $user->id,
        ]);
        return redirect()->route('users.index');
    }

    
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function update_client(Request $request, User $user){
        $user->update_client($request);
        return back();
    }

    public function update_password(ChangePasswordRequest $request, User $user){
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back();
    }

}
