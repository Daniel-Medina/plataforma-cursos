@extends('adminlte::page')
@section('title', 'Mi Cuenta')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'autocomplete' => 'off', 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre', ) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>


@stop