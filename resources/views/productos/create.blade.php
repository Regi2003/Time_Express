@extends('layouts.app')

@section('title', 'CREAR PRODUCTO')

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

    <h1>CREAR PRODUCTO</h1>

    <form action="{{ route('producto.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">NOMBRE</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">DESCRIPCION</label>
            <textarea name="descripcion" id=""></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">PRECIO</label>
            <input type="number" class="form-control" name="precio" id="precio" placeholder="precio">
        </div>

        <div class="mb-3">
            <label for="inventario" class="form-label">INVENTARIO</label>
            <input type="number" class="form-control" name="inventario" id="inventario" placeholder="inventario">
        </div>

        <input class="btn btn-primary" type="submit" value="ENVIAR">
        <a href="{{ route('producto.list')}}">volver</a>
    </form>
</div>
@endsection