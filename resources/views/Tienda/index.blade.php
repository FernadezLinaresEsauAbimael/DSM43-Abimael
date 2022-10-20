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




<a href="{{ url('tienda/create') }}" class="btn btn-success" > Registrar una Tienda </a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
  
            <tr>

                <th>Id</th>
                <th>Foto</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Acciones</th>

            </tr>
    </thead>

        <tbody>
            @foreach( $tiendas as $tienda )
            <tr>

                <td>{{ $tienda->id }}</td>

                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$tienda->foto }}" width="100" alt="">  
                </td>

                <td>{{ $tienda->clave }}</td>
                <td>{{ $tienda->nombre }}</td>

                <td>

                    <a href="{{ url('/tienda/'.$tienda->id.'/edit') }}" class="btn btn-warning">
                                Editar
                    </a>
                    
                    <br>
                    <br>
                
                    <form action="{{ url('/tienda/'.$tienda->id) }}" class="b-inline" method="post">
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