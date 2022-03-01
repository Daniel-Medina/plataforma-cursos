@extends('adminlte::page')
@section('title', 'Mi Cuenta')

@section('content_header')
    <h1>Nuevo Nivel</h1>
@stop

@section('content')


    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.levels.store', 'autocomplete' => 'off']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Nivel.']) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear Nivel', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>


@stop
