@if(count($errors)>0)

    <div class="alert alert-danger" rote="alert">
        <ul>
            @foreach( $errors->all() as $errors)  
            <li> {{ $errors }} </li>
             @endforeach
        </ul>

    </div>

    

@endif
    <div class="form-group">

        <label for="clave"> clave </label>
        <input type="text" class="form-control" name="clave" value="{{ isset($tienda->clave)?$tienda->clave:'' }}" id="clave">
    </div>

    <div class="form-group">
        <label for="nombre"> Nombre </label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($tienda->nombre)?$tienda->nombre:'' }}" id="nombre">
    </div>

    <div class="form-group">
        <label for="foto"> </label>
        @if(isset($usuario->foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$tienda->foto }}" width="100" alt="">  
        @endif
        <input type="file" class="form-control" name="foto" value="" id="foto">
    </div>

    <input class="btn btn-success" type="submit" value="Guardar Datos">

    <a class="btn btn-primary" href="{{ url('tienda/') }}"> Regresar</a>
