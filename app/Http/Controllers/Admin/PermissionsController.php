<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;

class PermissionsController extends Controller
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
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/

        $permissions = Permission::all();
        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    public function create()
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        return view('admin.permissions.create');
    }

    public function store(StorePermissionsRequest $request)
    {
        /*if (! Gate::allows('perm_administrador')) {
            return abort(404);
        }*/
        Permission::create($request->all());
        return redirect('/permisos')->with('success', 'Permiso creado.');
    }
}
