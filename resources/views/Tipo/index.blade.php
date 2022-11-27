@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    <h1>Tipos</h1>
@stop

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




<a href="{{ url('tipo/create') }}" class="btn btn-success" > Registrar un nuevo Tipo</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
  
            <tr>

                <th>Id</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Activo</th>
                <th>Acciones</th>

            </tr>
    </thead>

        <tbody>
            @foreach( $tipos as $tipo )
            <tr>

                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->nombre }}</td>
                <td>{{ $tipo->detalle }}</td>
                <td>{{ $tipo->activo }}</td>

                <td>

                    <a href="{{ url('/tipo/'.$tipo->id.'/edit') }}" class="btn btn-warning">
                                Editar
                    </a>
                    
                    <br>
                    <br>
                
                    <form action="{{ url('/tipo/'.$tipo->id) }}" class="b-inline" method="post">
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
{!! $tipos->links() !!}

</div>
@endsection