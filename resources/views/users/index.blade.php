@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    Usuarios
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>

                                    @can('users.show')
                                        <td with="10px"><a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a></td>
                                    @endcan

                                    @can('users.edit')
                                        <td with="10px"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a></td>
                                    @endcan

                                    @can('users.destroy')
                                        <td with="10px">
                                            {!! Form::open(['route'=>['users.destroy',$user->id],
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
                    {{ $users->render() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection