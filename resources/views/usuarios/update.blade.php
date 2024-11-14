@extends('layouts.app')

@section('title', 'EDITAR USUARIO')

@section('content')

<div class="container">

    <h1>EDITAR USUARIOS</h1>

    <form action="{{ route('user.update.data', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="nombre" Value="{{ $usuario->name }}">
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">APELLIDOS</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="apellido" Value="{{ $usuario->apellidos }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">CORREO ELECTRONICO</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="correo" Value="{{ $usuario->email }}">
        </div>

        <input class="btn btn-primary" type="submit" value="ENVIAR">
        <a href="{{ route('user.list') }}">Volver</a>
    </form>
</div>
@endsection