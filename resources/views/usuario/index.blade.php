@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dsmissible" rote="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif




<a href="{{ url('usuario/create') }}" class="btn btn-success" > Registrar un nuevo Usuario</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
  
            <tr>

                <th>Id</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Fecha de Nacimiento</th>
                <th>Email</th>
                <th>Pass</th>
                <th>Nivel</th>
                <th>Activo</th>
                <th>Acciones</th>

            </tr>
    </thead>

        <tbody>
            @foreach( $usuarios as $usuario )
            <tr>

                <td>{{ $usuario->id }}</td>

                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$usuario->foto }}" width="100" alt="">  
                </td>

                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->app }}</td>
                <td>{{ $usuario->apm }}</td>
                <td>{{ $usuario->fn }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->pass }}</td>
                <td>{{ $usuario->nivel }}</td>
                <td>{{ $usuario->activo }}</td>

                <td>

                    <a href="{{ url('/usuario/'.$usuario->id.'/edit') }}" class="btn btn-warning">
                                Editar
                    </a>
                    
                    <br>
                    <br>
                
                    <form action="{{ url('/usuario/'.$usuario->id) }}" class="b-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" 
                    value="Borrar">

                    </form>

                </td>

            </tr>
            @endforeach
    
    </tbody>

</table>

</div>
@endsection