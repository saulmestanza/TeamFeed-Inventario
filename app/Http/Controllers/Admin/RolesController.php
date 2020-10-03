<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;

class RolesController extends Controller
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
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/

        $roles = Role::all();
        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        $permissions = Permission::get()->pluck('name', 'name');
        return view('admin.roles.create')->with('permissions', $permissions);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        $role = Role::create($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);
        return redirect('/roles')->with('role', $role)->with('permissions', $permissions);
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        $permissions = Permission::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);
        return view('admin.roles.edit')->with('role', $role)->with('permissions', $permissions);
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        $role = Role::findOrFail($id);
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);
        return redirect('/roles')->with('role', $role)->with('permissions', $permissions);
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect('/roles')->with('success', 'Rol eliminado.');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
