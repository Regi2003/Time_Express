@extends('layouts.app')

@section('title', 'Lista de productos')

@section('content')
<h1>PRODUCTOS</h1>
<div class="text-end">
    <a href="{{ route('producto.create') }}" class="btn btn-primary">CREAR</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">DESCRIPCION</th>
        <th scope="col">PRECIO</th>
        <th scope="col">INVENTARIO</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td>{{ $productos->id }}</td>
            <td>{{ $productos->nombre }}</td>
            <td>{{ $productos->descripcion }}</td>
            <td>{{ $productos->precio }}</td>
            <td>{{ $productos->inventario }}</td>
            <td>
<a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-primary"> Editar </a>            <td>
                <form action="{{ route('producto.productos.destroy', $productos->id)}}" method="post">
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
{{ $productos->links('pagination::bootstrap-4') }}

@endsection
