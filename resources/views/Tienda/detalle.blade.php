@include('bares')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kanas{
            border: 3px solid ;
            padding: 80px;
            margin: 80px;
            font-size: 45px;
      

        }
        #pu{
            text-align: center;

        }
#ps{
    margin-left: 220px;
    font-size: 60px;

}
    </style>
</head>
<body>
    
<section class="kanas">
<h1 id="pu"> {{$detalle_productos->nombre }}</h1>
@if( $detalle_productos -> cantidad < 10)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$detalle_productos -> nombre   }}</i>
    </div>
    @elseif( $detalle_productos -> cantidad > 10 and $detalle_productos -> cantidad < 30 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR {{$detalle_productos -> nombre   }}</i>
    </div>

    @elseif( $detalle_productos -> cantidad > 30 )
   
    
    @endif 
    <table>

    <tr>
    <hr>
    <br>
    <td>
<strong>CLAVE:</strong> {{$detalle_productos->clave }}<br><br>
<strong>NOMBRE:</strong> {{$detalle_productos->nombre }}<br><br>
<strong>CANTIDAD:</strong> {{$detalle_productos->cantidad}}<br><br>
<strong>COSTO:</strong> {{$detalle_productos->costo}}<br><br>
<strong>ACTIVO: 
   @if($detalle_productos -> activo ==1)

    <i style="color: #FF28B4;">Activo</i>
    @else
    <i style="color: #f00;">Inactivo</i>
    @endif   
    </strong>
    </td>
  <td>  <img id="ps" src="{{ asset ('aproductos/'.$detalle_productos->foto)   }}" style="width:700px"><br>
</td>

</tr>
    </table>
  
    </section>
    <script>
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);


</script>

</body>
</html>