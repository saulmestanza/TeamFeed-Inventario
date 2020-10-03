@extends('layouts.home')

@section('fragment')
    <h3 class="page-title">Crear Usuario</h3>
    {!! Form::open(['action' => 'App\Http\Controllers\Admin\UsersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class="panel panel-default">

        <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                        {!! Form::label('last_name', 'Apellido*', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('last_name'))
                            <p class="help-block">
                                {{ $errors->first('last_name') }}
                            </p>
                        @endif
                    </div>
                <div class="form-group">
                        {!! Form::label('username', 'Usuario*', ['class' => 'control-label']) !!}
                        {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('username'))
                            <p class="help-block">
                                {{ $errors->first('username') }}
                            </p>
                        @endif
                    </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                        {!! Form::label('is_active', 'Activo*', ['class' => 'control-label']) !!}
                        {{ Form::checkbox('is_active', '1') }}
                </div>
                <div class="form-group">
                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                    {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif
                </div>

        </div>
    </div>

    {{Form::submit('Crear', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@stop

