@include('bares')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
        color: ;
     
        background-size: 300px; 
        background-image: url(..  public/aproductos/SOL.jpg);
             }
    #best{
        margin-top: 80px;
    background-repeat: no-repeat;
    background-size: 1300px;
        text-align: center;
        width: 50%;                          }
  
    input,select{
            margin-left: 100px;
            float: center;
            background:;                      }
        #lol{            color: yellow;       }
     #coca {      background: #2C4EC0;        }
        #cma{   margin-left: 300px;           }
       #lom{ margin-left: 340px;              }
       #comit{ margin-left: 380px;            }
        select{  background: #C1BCBC;         }
        .kanas{
            
            border: 3px double #000000;
            border-radius: 200px 80px;
                     padding: 80px;
                  
            margin: 80px;
            margin-top: 30px;
            font-size: 45px;
            padding-left: 200px
      

        }

        
        #suma:hover{
            background-color: black;

        }
        @keyframes shake{
    0%{
        transform:  rotate(3deg) ;
        width: 60px;
   
}
50%{
    transform: rotate(-3deg);
width: 80px;
}
100%{
    transform: rotate(80px);
width: 100px;
   
}
}
#soso:focus{
    animation: shake .5s;
    border: 2px solid yellow;
    outline: none;
    transition: all 2s ease;
}
        #pu{
            text-align: center;

        }
#ps{
    margin-left: 400px;
    font-size: 60px;

}
#kks{
    font-size: 60px;
    text-align: center;
}
.input-group-text{
    font-size: 30px;  
    width: 400px;
    text-align: center;
}
.input:text{
    font-size: 30px;  

}
</style>
</head>
<body>
    


    
    <section class="kanas">
<h1 id="pu"> </h1>
@if( $usuarios -> cantidad < 10)
    <div class="alert alert-danger" role="alert">
<i>URGENTE !ESTA POR AGOTARSE {{$usuarios -> nombre   }}</i>
    </div>
    @elseif( $usuarios -> cantidad > 10 and $usuarios -> cantidad < 30 )
    <div class="alert alert-warning" role="alert">
    <i>ATENTO SE COMIENZA A AGOTAR {{$usuarios -> nombre   }}</i>
    </div>

    @elseif( $usuarios -> cantidad > 30 )

    
    @endif 
    <form action="{{ route('salvar_productos',['id' => $usuarios->id_producto]) }}" method="POST" class="row g-3" enctype="multipart">

@csrf
{{method_field('PUT')}}
    <a id="kks">{{$usuarios->nombre }}</a>
    <hr>
    <table>

    <tr>

    <td>
    <div class="input-group mb-3">
  <div class="input-group-prepend">
  <input type="hidden" aria-label="First name" value="{{ $usuarios -> id_producto }}" class="form-control" name="id_producto" style="margin-right: 20px">

  <label class="input-group-text" for="inputGroupSelect01">ID  :       {{ $usuarios -> id_producto }}</label>
  </div>
 <br>
 
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <input type="hidden" aria-label="First name" value="{{ $usuarios -> clave }}" class="form-control" name="clave" style="margin-right: 20px">

  <label class="input-group-text" for="inputGroupSelect01">CLAVE  :       {{ $usuarios -> clave }}</label>
  </div>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">CANTIDAD:        
    {{ $usuarios -> cantidad }}
  </label>
  </div>
 <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">INSUMOS:        
    
  <input type="text" aria-label="First name" id="soso" value="" class="form-control" name="insumos" style="margin-right: 20px">
  </label>
  </div>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">INGRESOS:        
    
  <input type="text" aria-label="First name" id="soso" value="" class="form-control" name="ingresos" style="margin-right: 20px">
  </label>
  </div>
 <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <input type="hidden" aria-label="First name" value="{{ $usuarios -> costo }}" class="form-control" name="costo" style="margin-right: 20px">

  <label class="input-group-text" for="inputGroupSelect01">COSTO :       {{ $usuarios -> costo }}</label>
  </div>
 <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <input type="hidden" aria-label="First name" value="{{ $usuarios -> id_tienda }}" class="form-control" name="id_tienda" style="margin-right: 20px">

  <label class="input-group-text" for="inputGroupSelect01">TIENDA :       {{ $usuarios -> id_tienda }}</label>
  </div>
<br>

  
    </td>
    <td><img id="pots" src="{{ asset ('aproductos/'.$usuarios->foto) }}" style="width:700px; margin-right: 200px; padding-bottom: 80px"></td>
<input type="hidden" name="foto" value="{{$usuarios->foto}}">

              
                    
                    <div>


</tr>
<tr>   <button type="submit" class="btn btn-primary" value="" id="suma" style="width:  400px; text-align: center; margin-left: 800px">ACTUALIZAR DATOS </button></tr>
    </table>
  
    </section>




  <!--  
  
 -->
                        
                 
                    
</form>
<hr>





</body>
</html>