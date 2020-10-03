<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
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
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('Ver Usuarios')) {
            return abort(404);
        }

        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('Crear Usuario')) {
            return abort(404);
        }
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('Crear Usuario')) {
            return abort(404);
        }
        $user = User::create($request->all());
        if($request->input("is_active") && $request->input("is_active") == 1){
            $user->is_active = 1;
        }else{
            $user->is_active = 0;
        }
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        $user->createToken('MyApp')->accessToken;
        return redirect('/usuarios')->with('success', 'Usuario creado.');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('Editar Usuario')) {
            return abort(404);
        }
        $roles = Role::get()->pluck('name', 'name');
        $user = User::findOrFail($id);
        return view('admin.users.edit')->with('roles', $roles)->with('user', $user);
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('Editar Usuario')) {
            return abort(404);
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|max:255|unique:users,email,'.$id,
            'roles' => 'required',
        ]);
        $user = User::findOrFail($id);
        if($request->input("is_active") && $request->input("is_active") == 1){
            $user->is_active = 1;
        }else{
            $user->is_active = 0;
        }
        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);
        // $user->createToken('MyApp')->accessToken;
        return redirect('/usuarios')->with('success', 'Usuario editado.');
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('Eliminar Usuario')) {
            return abort(404);
        }
        $user = User::findOrFail($id);
        $user->is_active = 0;
        $user->save();
        return redirect('/usuarios')->with('success', 'Usuario eliminado.');
    }
}
