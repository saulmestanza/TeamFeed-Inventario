@inject('request', 'Illuminate\Http\Request')
@extends('layouts.home')

@section('fragment')
<div class="row">
	<div class="col">
			<div class="card-header border-0">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Roles</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{!! url('/roles/create'); !!}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Crear Rol</a>
                        </div>
                    </div>
                </div>
			</div>
			<div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Permisos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr data-entry-id="{{ $role->id }}">
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions()->pluck('name') as $permission)
                                            <span class="label label-info label-many">{{ $permission }},</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                        <a style="color: white" data-toggle="modal" data-target="#modal-delete-{{$role->id}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </button>
                                        <div class="modal fade" id="modal-delete-{{$role->id}}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar Usuario</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Desea eliminar el usuario <b>{{$role->name}}</b>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!!Form::open(['action' => ['App\Http\Controllers\Admin\RolesController@destroy', $role->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}
                                                        {!!Form::close()!!}
                                                        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No existen roles</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
			</div>
			<div class="card-footer py-4">
				<nav aria-label="...">
				</nav>
			</div>
	</div>
</div>
@stop
