@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
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
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <head/>

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
        <!-- 


    AQUI EMPIEZA EL CODIGO GEMELUSKI
    
     -->
        @if($producto -> nombre == "Salsa Verde" )  
    @if( $producto -> cantidad < 20 )
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 20 and $producto -> cantidad < 60 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 30 )
     
    
    @endif 
    @endif




    @if($producto -> nombre == "Salsa Roja" )  
    @if( $producto -> cantidad < 20)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 20 and $producto -> cantidad < 30 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 30 )
     
    
    @endif 
    @endif



    @if($producto -> nombre == "Totopos" )  
    @if( $producto -> cantidad < 30)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 30 and $producto -> cantidad < 60 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 60 )
    
    @endif 
    @endif




    @if($producto -> nombre == "Tortillas" )  
    @if( $producto -> cantidad < 20)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 20 and $producto -> cantidad < 40 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 40 )
   
    @endif 
    @endif




    @if($producto -> nombre == "Masa" )  
    @if( $producto -> cantidad < 80)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 80 and $producto -> cantidad < 120 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR {{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 120 )
    
    
    @endif 
    @endif




<!--     @if($producto -> nombre == "maiz" ) 
    @if( $producto -> cantidad < 200)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 200 and $producto -> cantidad < 250 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 300 )
   
    
    @endif 
    @endif
 -->
<!-- AQUI TERMINA -->



        <tr>
        
            <td>{{ $producto->id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('Archivos').'/'.$producto->foto }}" width="100" alt="">  
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
{!! $productos->links() !!}

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);


</script>


</div>
@endsection
