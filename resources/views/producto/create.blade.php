@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Productos</h3>
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

                        <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="clave">Clave</label>
                                    <input type="text" name="clave" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="imagen">Foto</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" name="cantidad" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-xm-12 col-md-12">
                                <div class="form-group">
                                    <label for="costo">Costo</label>
                                    <input type="text" name="costo" class="form-control">
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


