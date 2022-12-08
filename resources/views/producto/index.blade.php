@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center"></h3>

                            @can('crear-producto')
                            <a class="btn btn-warning" href="{{ route('producto.create') }}">Nuevo</a>
                            @endcan
<br>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #77ef";>
                                    <th style="color: #fff;">ID</th>
                                    <th style="color: #fff;">Clave</th>
                                    <th style="color: #fff;">Imagen</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">Cantidad</th>
                                    <th style="color: #fff;">Costo</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)


                            
                             
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
                                            <td>{{ $producto->clave }}</td>
                                            
                                            <td><img src="{{ asset ('Archivos/'.$producto->foto)   }}" style="width:50px"></td>
                                        
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>$ {{ $producto->costo }}</td>
                                            <td>
                                                <form action="{{ route('producto.destroy',$producto->id) }}" method="POST">


                                                @can('editar-producto')
                                                <a class="btn btn-primary" href="{{ route('producto.edit',$producto->id) }}">Editar</a>
                                                @endcan
                                                
                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-producto')
                                                <button type="submit" class="btn btn-danger">Borrar</button>
                                                @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                            {!! $productos->links() !!}


                            <script>
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

