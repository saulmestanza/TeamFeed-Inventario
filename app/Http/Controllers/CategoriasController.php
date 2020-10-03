<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
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

        $categorias = Categoria::all();
        return view('categorias.index')->with('categorias', $categorias);
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
        return view('categorias.create');
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
        $categoria = Categoria::create($request->all());
        return redirect('/categorias')->with('success', 'Categoria creada.');
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
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit')->with('categoria', $categoria);
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
        $categoria = Categoria::findOrFail($id);
        if($request->input("is_active") && $request->input("is_active") == 1){
            $categoria->is_active = 1;
        }else{
            $categoria->is_active = 0;
        }
        $categoria->update($request->all());
        return redirect('/categorias')->with('success', 'Categoria editada.');
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
        $categoria = Categoria::findOrFail($id);
        $categoria->is_active = 0;
        $categoria->save();
        return redirect('/categorias')->with('success', 'Categoria eliminada.');
    }
}
