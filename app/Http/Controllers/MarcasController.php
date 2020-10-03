<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class MarcasController extends Controller
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

        $marcas = Marca::all();
        return view('marcas.index')->with('marcas', $marcas);
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
        return view('marcas.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('Crear Usuario')) {
            return abort(404);
        }
        $marca = Marca::create($request->all());
        return redirect('/marcas')->with('success', 'Marca creada.');
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
        $marca = Marca::findOrFail($id);
        return view('marcas.edit')->with('marca', $marca);
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\Request  $request
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
        ]);
        $marca = Marca::findOrFail($id);
        if($request->input("is_active") && $request->input("is_active") == 1){
            $marca->is_active = 1;
        }else{
            $marca->is_active = 0;
        }
        $marca->update($request->all());
        return redirect('/marcas')->with('success', 'Marca editada.');
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
        $marca = Marca::findOrFail($id);
        $marca->is_active = 0;
        $marca->save();
        return redirect('/marcas')->with('success', 'Marca eliminada.');
    }
}
