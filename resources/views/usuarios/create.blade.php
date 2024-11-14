@extends('layouts.app')

@section('title', 'CREAR USUARIO')

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>CREAR USUARIO</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="nombre">
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">APELLIDOS</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="apellido">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">CORREO ELECTRONICO</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="correo">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="contraseña">
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">ROL</label>
            <input type="text" class="form-control" name="rol" id="rol" placeholder="rol">
        </div>

        <input class="btn btn-primary" type="submit" value="ENVIAR">
        <a href="{{ route('user.list')}}">volver</a>
    </form>
</div>
@endsection