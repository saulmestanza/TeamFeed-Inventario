@extends('layouts.home')

@section('fragment')
    <h3 class="page-title">Crear Marca</h3>
    {!! Form::open(['action' => 'App\Http\Controllers\MarcasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

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
                        {!! Form::label('is_active', 'Activo*', ['class' => 'control-label']) !!}
                        {{ Form::checkbox('is_active', '1') }}
                </div>

        </div>
    </div>

    {{Form::submit('Crear', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@stop

