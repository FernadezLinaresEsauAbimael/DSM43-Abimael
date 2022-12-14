@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tortilleria</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h5>Usuarios</h5>
                                        @php 
                                        use App\Models\User;
                                        $cant_usuarios = User::count(); 
                                        @endphp  
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/usuario" class="text-white">Ver más</a></p>
                                    </div>
                                </div>

                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h5>Productos</h5>
                                        @php 
                                        use App\Models\Productos;
                                        $cant_productos = Productos::count(); 
                                        @endphp  
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_productos}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/producto" class="text-white">Ver más</a></p>
                                    </div>
                                </div>

                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Roles</h5>
                                        @php 
                                        use Spatie\Permission\Models\Role;
                                        $cant_roles = Role::count(); 
                                        @endphp  
                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_roles}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


