<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/89cf5eeff0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

   

<style>
  .alert{
    text-align: center;

               width: 500px;
    margin-right: 500px;
    margin-left: 680px;
    transition: animation 1.5s ease;
    transform: rotate (0.5deg);
  
 /*    animation-name: example;
    animation-duration: 10s; 
     position: relative;
  animation: mymove 5s ;  */

  }
/* @keyframes mymove {
  from {top: 0px;}
  to {top: 250px;}
}  */
</style>
</head>
@include('bares')
    <table class="table table-striped">
<thead>
    <tr>
      <th scope="col" style="color: #591C68">Id</th>
      <th scope="col" style="color: #591C68">Foto</th>
      <th scope="col" style="color: #591C68">Clave</th>
      <th scope="col" style="color: #591C68">Nombre</th>
      <th scope="col" style="color: #591C68">Cantidad</th>
      <th scope="col" style="color: #591C68">Costo</th>
      <th scope="col" style="color: #591C68">Id_tipo</th>
      <th scope="col" style="color: #591C68">Id_tienda</th>

      <th scope="col" style="color: #591C68">Editar</th>
      <th scope="col" style="color: #591C68">Eliminar</th>
      <th scope="col" style="color: #591C68">Detalles</th>


    </tr>
  </thead>

@foreach($productos1 as $producto)
<tr>
      <td>{{ $producto -> id   }}</td>
    <td><img src="{{ asset ('aproductos/'.$producto->foto)   }}" style="width:50px"></td>
    <td>{{ $producto -> clave   }}</td>
    <td>{{ $producto -> nombre   }}</td>
    @if($producto -> nombre == "Salsa Verde" )  
    @if( $producto -> cantidad < 10)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 10 and $producto -> cantidad < 30 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 30 )
     
    
    @endif 
    @endif




    @if($producto -> nombre == "Salsa Roja" )  
    @if( $producto -> cantidad < 10)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 10 and $producto -> cantidad < 30 )
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
    @elseif( $producto -> cantidad > 30 and $producto -> cantidad < 50 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 50 )
    
    @endif 
    @endif




    @if($producto -> nombre == "tortillas" )  
    @if( $producto -> cantidad < 80)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$producto -> nombre   }}</i>
    </div>
    @elseif( $producto -> cantidad > 80 and $producto -> cantidad < 100 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR{{$producto -> nombre   }}</i>
    </div>

    @elseif( $producto -> cantidad > 100 )
   
    @endif 
    @endif




    @if($producto -> nombre == "masa" )  
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




    @if($producto -> nombre == "maiz" ) 
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
    <td>{{ $producto -> cantidad    }}   </td>
    <td>{{ $producto -> costo   }}</td>
    <td>{{ $producto -> id_tipo   }}</td>
    <td>{{ $producto -> id_tienda   }}</td>

    

    <td>
    <a href="{{route('editar_productos',['id' => $producto->id_producto])   }}">
  
    <button style="background-color:#FAB9F3;  border-radius:22px; border:3px solid #FAB9F3;"  type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>
  <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
</svg></button></td>
<td>
<a href="{{route('borrar_productos',['id' => $producto->id_producto])   }}" onclick="return confirm('ESTAS SEGURO QUE QUIERES BORRAR ESTE productos');">
  
<button  style="background-color:#C482BF;  border-radius:22px; border:3px solid #C482BF;"  type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
  <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
</svg></button></td>
<td>
<a href="{{  route('detalle_productos',['id' => $producto->id_producto])   }}">  
  
<button style="background-color:#FAB9F3;  border-radius:22px; border:3px solid #FAB9F3;" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></button></td>
</td>
</tr>
@endforeach
    </table>
    <script>
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);


</script>
</body>
</html>