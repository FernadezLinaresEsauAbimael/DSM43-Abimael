@extends('layouts.app')

@section('content')
<div class="container">

<h1> Crear Usuario </h1>

    <form action="{{ url('/tienda') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('tienda.form')

        
        
    </form>
</div>
@endsection