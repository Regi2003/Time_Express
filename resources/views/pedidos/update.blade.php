@extends('layouts.app')

@section('title', 'EDITAR PRODUCTO')

@section('content')

    <h1>EDITAR PRODUCTOS</h1>

    <form action="{{ route('pedido.update.data', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="cliente" class="form-label">CLIENTE</label>
            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="nombre del cliente" value="{{ $pedido->cliente }}">
        </div>

        <div class="mb-3">
            <label for="producto" class="form-label">PRODUCTO</label>
            <input type="text" class="form-control" name="producto" id="producto" placeholder="producto" value="{{ $pedido->producto }}">
        </div>

        <div class="mb-3">
            <label for="fecha_pedido" class="form-label">FECHA DEL PEDIDO</label>
            <input type="date" class="form-control" name="fecha_pedido" id="fecha_pedido" placeholder="fecha del pedido" value="{{ $pedido->fecha_pedido }}">
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">TOTAL</label>
            <input type="number" class="form-control" name="total" id="total" placeholder="total" value="{{ $pedido->total }}">
        </div>

        <input class="btn btn-primary" type="submit" value="ENVIAR">
        <a href="{{ route('pedido.list')}}">volver</a>
    </form>
</div>
@endsection