<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar usuarios')->only('index');
        $this->middleware('can:Editar Rol')->only('edit','update');
    }


//CRUD
    public function index()
    {
        //
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        //
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

   
    public function update(Request $request, User $user)
    {
        //
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user);
    }

}
