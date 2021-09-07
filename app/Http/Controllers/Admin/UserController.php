<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.users.show', compact('user'));
    }

    public function create(Request $request)
    {
        $roles = Role::all();
        return view('admin.users.create', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return back()->with('status','Creado con exito');
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, user $user)
    {
        $user->update($request->all());
        return back()->with('status','Actualizado con exito');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return back()->with('status','Eliminado con exito.');
    }
}