@extends('layouts.app')

@section('title', 'Lista de pedidos')

@section('content')
<h1>PEDIDOS</h1>
<div class="text-end">
    <a href="{{ route('pedido.create') }}" class="btn btn-primary">CREAR</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">CLIENTE</th>
        <th scope="col">PRODUCTO</th>
        <th scope="col">FECHA</th>
        <th scope="col">TOTAL</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->cliente }}</td>
            <td>{{ $pedido->producto }}</td>
            <td>{{ $pedido->fecha_pedido }}</td>
            <td>{{ $pedido->total }}</td>
            <td>
                <a href="{{ route('pedido.update', $pedido->id)}}" class="btn btn-primary"> Editar </a>
            </td>
            <td>
                <form action="{{ route('pedido.destroy', $pedido->id)}}" method="post">
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
{{ $pedidos->links('pagination::bootstrap-4') }}

@endsection
