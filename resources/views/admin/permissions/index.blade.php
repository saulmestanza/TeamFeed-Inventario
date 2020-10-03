@inject('request', 'Illuminate\Http\Request')
@extends('layouts.home')

@section('fragment')
<div class="row">
	<div class="col">
			<div class="card-header border-0">
                <div class="">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Permisos</h3>
                        </div>
                    </div>
                </div>
			</div>
			<div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre Permiso</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td>{{ $permission->name }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No existen permisos</td>
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
