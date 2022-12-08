@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de Usarios</h3>
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
                        <form action="{{ route('usuario.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            {!! Form::open(array('route'=>'usuario.store','method'=>'POST')) !!}
                            <div class="now">
                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {!! Form::password('password', array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Password</label>
                                        {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="clo-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>

                            </div>
                            {!! Form::close() !!}
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

