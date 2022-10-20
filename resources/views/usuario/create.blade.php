

@extends('layouts.app')

@section('content')
<div class="container">

<h1> Crear Usuario </h1>

    <form action="{{ url('/usuario') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('usuario.form')

        
        
    </form>
</div>
@endsection