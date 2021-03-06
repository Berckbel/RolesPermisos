@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    Productos
                    @can('products.create')
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px" >ID</th>
                                <th>NOMBRE</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>

                                    @can('products.show')
                                        <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a></td>
                                    @endcan

                                    @can('products.edit')
                                    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a></td>
                                    @endcan

                                    @can('products.destroy')
                                        <td>
                                            {!! Form::open(['route'=>['products.destroy',$product->id],
                                            'method'=>'DELETE']) !!}
                                                <button class="btn btn-sm btn-danger">
                                                    Eliminar
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->render() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection