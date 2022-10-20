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


<a href="{{ url('producto/create') }}" class="btn btn-success" > Registrar un nuevo Producto</a>
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
            <th>Cantidad</th>
            <th>Costo</th>
            <th>Id_tipo</th>
            <th>Id_tienda</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>
        @foreach( $productos as $producto )

        <tr>
        
            <td>{{ $producto->id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto }}" width="100" alt="">  
            </td>

            <td>{{ $producto->clave }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->costo }}</td>
            <td>{{ $producto->id_tipo }}</td>
            <td>{{ $producto->id_tienda }}</td>
            <td>{{ $producto->activo }}</td>
            
            <td>

                    <a href="{{ url('/producto/'.$producto->id.'/edit') }}" class="btn btn-warning">
                                Editar
                    </a>
                    
                    <br>
                    <br>
                
                    <form action="{{ url('/producto/'.$producto->id) }}" class="b-inline" method="post">
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
