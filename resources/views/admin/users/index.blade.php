@inject('request', 'Illuminate\Http\Request')
@extends('layouts.home')

@section('fragment')
<div class="row">
	<div class="col">
			<div class="card-header border-0">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Usuarios</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{!! url('/usuarios/create'); !!}" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Crear Usuario</a>
                        </div>
                    </div>
                </div>
			</div>
			<div class="table-responsive">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">Nombre Usuario</th>
							<th scope="col">Nombre Completo</th>
							<th scope="col">Estado</th>
							<th scope="col">Rol</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }} {{ $user->last_name }}</td>
                                @if ($user->is_active == 1)
                                <td><span class="badge badge-success">ACTIVO</span></td>
                                @else
                                <td><span class="badge badge-default">INACTIVO</span></td>
                                @endif
                                <td>
                                    @foreach ($user->roles()->pluck('name') as $role)
                                        <span class="label label-info label-many">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.edit', $user->id) }}" style="color: white" class="btn btn-xs btn-success"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                    <a style="color: white" data-toggle="modal" data-target="#modal-delete-{{$user->id}}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <div class="modal fade" id="modal-delete-{{$user->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Eliminar Usuario</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Desea eliminar el usuario <b>{{ $user->name }} {{ $user->last_name }}</b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {!!Form::open(['action' => ['App\Http\Controllers\Admin\UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
                            <td>No existen usuarios creados.</td>
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
