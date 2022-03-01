@extends('adminlte::page')
@section('title', 'Mi Cuenta')

@section('content_header')
    <a href="{{route('admin.levels.create')}}" class="btn btn-secondary float-right">Crear Nivel</a>
    <h1>Lista de Niveles</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    @if (session('info-error'))
        <div class="alert alert-danger">
            {{session('info-error')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{$level->id}}</td>
                            <td>{{$level->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.levels.edit', $level)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop
