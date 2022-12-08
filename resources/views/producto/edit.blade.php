@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                        @if($errors->any())
                            <div class="alert alert-dark alert-dimissible fade show" role="alert">
                                <strong>¡Revise los Campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dimmis="alert" aria-label="Close" >
                                    <span aria-hidde="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('producto.update',$producto->id) }}" method="POST" enctype="multipart">
                        @csrf
                        
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Clave: {{$producto->clave }} </label>
                                    <input type="text" name="clave" class="form-control" value="{{ $producto->clave }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Clave: {{$producto->id }} </label>
                                    <input type="text" name="id" class="form-control" value="{{ $producto->id }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Imagen: {{$producto->imagen}}</label>
                                    <input type="file" name="imagen" class="form-control" value="{{ $producto->imagen }}">
                                    <td><img src="{{ asset ('Archivo/'.$producto->foto)   }}" style="width:50px"></td>

                                </div>
                            </div>
                            <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">INSUMOS:        
    
  <input type="text" aria-label="First name" id="soso" value="" class="form-control" name="insumos" style="margin-right: 20px">
  </label>
  </div>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">INGRESOS:        
    
  <input type="text" aria-label="First name" id="soso" value="" class="form-control" name="ingresos" style="margin-right: 20px">
  </label>
  </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre: {{ $producto->nombre }}</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cantida">Cantidad<: {{ $producto->cantidad }}</label>
                                    <input type="text" name="cantidad" class="form-control" value="{{ $producto->cantidad }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="costo">Costo: {{ $producto->costo }}</label>
                                    <input type="text" name="costo" class="form-control" value="{{ $producto->costo }}">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


