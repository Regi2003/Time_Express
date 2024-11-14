@extends('layouts.app')

@section('title', 'CREAR PEDIDOS')

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

    <h1>CREAR PEDIDOS</h1>

    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cliente" class="form-label">CLIENTE</label>
            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="nombre del cliente">
        </div>

        <div class="mb-3">
            <label for="producto" class="form-label">PRODUCTO</label>
            <input type="text" class="form-control" name="producto" id="producto" placeholder="producto">
        </div>

        <div class="mb-3">
            <label for="fecha_pedido" class="form-label">FECHA DEL PEDIDO</label>
            <input type="date" class="form-control" name="fecha_pedido" id="fecha_pedido" placeholder="fecha del pedido">
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">TOTAL</label>
            <input type="number" class="form-control" name="total" id="total" placeholder="total">
        </div>

        <input class="btn btn-primary" type="submit" value="ENVIAR">
        <a href="{{ route('pedido.list')}}">volver</a>
    </form>
</div>
@endsection