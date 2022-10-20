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
        <input type="text" class="form-control" name="clave" value="{{ isset($usuario->clave)?$usuario->clave:'' }}" id="clave">
    </div>

    <div class="form-group">
        <label for="nombre"> Nombre </label>
        <input type="text" class="form-control" name="nombre" value="{{ isset($usuario->nombre)?$usuario->nombre:'' }}" id="nombre">
    </div>

    <div class="form-group">
        <label for="app"> Apellido Paterno </label>
        <input type="text" class="form-control" name="app" value="{{ isset($usuario->app)?$usuario->app:'' }}" id="app">
    </div>

    <div class="form-group">
        <label for="apm"> Apellido Materno </label>
        <input type="text" class="form-control" name="apm" value="{{ isset($usuario->apm)?$usuario->apm:'' }}" id="apm">
    </div>

    <div class="form-group">
        <label for="fn"> Fecha de Nacimiento </label>
        <input type="date" class="form-control" name="fn" value="{{ isset($usuario->fn)?$usuario->fn:'' }}" id="fn">
    </div>
    
    <div class="form-group">
        <label for="gen"> Genero </label>
        <input type="text" class="form-control" class="form-control" name="gen" value="{{ isset($usuario->gen)?$usuario->gen:'' }}" id="gen">
    </div>

    <div class="form-group">
        <label for="foto"> </label>
        @if(isset($usuario->foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$usuario->foto }}" width="100" alt="">  
        @endif
        <input type="file" class="form-control" name="foto" value="" id="foto">
    </div>

    <div class="form-group">
        <label for="email"> Email </label>
        <input type="text" class="form-control" name="email" value="{{ isset($usuario->email)?$usuario->email:'' }}" id="email">
    </div>

    <div class="form-group">
        <label for="pass"> Password </label>
        <input type="text" class="form-control" name="pass" value="{{ isset($usuario->pass)?$usuario->pass:'' }}" id="pass">
    </div>

    <div class="form-group">
        <label for="nivel"> Nivel </label>
        <input type="text" class="form-control" name="nivel" value="{{ isset($usuario->nivel)?$usuario->nivel:'' }}" id="nivel">
    </div>

    <div class="form-group">
        <label for="activo"> Activo </label>
        <input type="text" class="form-control" name="activo" value="{{ isset($usuario->activo)?$usuario->activo:'' }}" id="activo">
    </div>

    <input class="btn btn-success" type="submit" value="Guardar Datos">

    <a class="btn btn-primary" href="{{ url('usuario/') }}"> Regresar</a>

