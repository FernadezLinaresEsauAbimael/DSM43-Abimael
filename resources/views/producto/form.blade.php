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
    <input type="text" class="form-control" name="clave" value="{{ isset($producto->clave)?$producto->clave:old('clave') }}" id="clave">
    </div>

    <div class="form-group">
    <label for="nombre"> Nombre </label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($producto->nombre)?$producto->nombre:old('nombre') }}" id="nombre">
    </div>

    <div class="form-groupo">
    <label for="cantidad"> Cantidad </label>
    <input type="text" class="form-control" name="cantidad" value="{{ isset($producto->cantidad)?$producto->cantidad:old('cantidad') }}" id="cantidad">
    </div>

    <div class="form-group">
    <label for="costo"> Costo </label>
    <input type="text" class="form-control" name="costo" value="{{ isset($producto->costo)?$producto->costo:old('costo') }}" id="costo">
    </div>

    <div class="form-group">
    <label for="id_tipo"> Id_tipo </label>
    <input type="text" class="form-control" name="id_tipo" value="{{ isset($producto->id_tipo)?$producto->id_tipo:old('id_tipo') }}" id="id_tipo">
    </div>

    <div class="form-group">
    <label for="id_tienda"> Id_tienda </label>
    <input type="text" class="form-control" name="id_tienda" value="{{ isset($producto->id_tienda)?$producto->id_tienda:old('id_tienda') }}" id="id_tienda">
    </div>

    <div class="form-group">
    <label for="activo"> Activo </label>
    <input type="text" class="form-control" class="form-control" name="activo" value="{{ isset($producto->activo)?$producto->activo:old('producto') }}" id="activo">
    </div>

    <div class="form-group">
    <label for="foto"> </label>
    @if(isset($producto->foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('Archivos').'/'.$producto->foto }}" width="100" alt="">  
    @endif
    <input type="file" class="form-control" name="foto" value="" id="foto">
    </div>

    <input class="btn btn-success" type="submit" value="Guardar Datos">

    <a class="btn btn-primary" href="{{ url('producto/') }}"> Regresar</a>

