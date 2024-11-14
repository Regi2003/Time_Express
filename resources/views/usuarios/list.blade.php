@extends('layouts.app')

@section('title', 'Lista de usuarios')

@section('content')
<h1>USUARIOS</h1>
<div class="text-end">
    <a href="{{ route('user.create') }}" class="btn btn-primary">CREAR</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">APELLIDOS</th>
        <th scope="col">CORREO</th>
        <th scope="col">ROL</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->rol }}</td>
            <td>
                <a href="{{ route('user.update', $usuario->id)}}" class="btn btn-primary"> Editar </a>
            </td>
            <td>
                <form action="{{ route('user.destroy', $usuario->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $usuarios->links('pagination::bootstrap-4') }}

@endsection
