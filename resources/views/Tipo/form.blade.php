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
        <label for="nombre"> Nombre </label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($tipo->nombre)?$tipo->nombre:'' }}" id="nombre">
    </div>

    <div class="form-group">
        <label for="detalle"> Detalle </label>
        <input type="text" class="form-control" name="detalle" value="{{ isset($tipo->detalle)?$tipo->detalle:'' }}" id="detalle">
    </div>

    <div class="form-group">
        <label for="activo"> Activo </label>
        <input type="text" class="form-control" name="activo" value="{{ isset($tipo->activo)?$tipo->activo:'' }}" id="activo">
    </div>

    <input class="btn btn-success" type="submit" value="Guardar Datos">

    <a class="btn btn-primary" href="{{ url('tipo/') }}"> Regresar</a>