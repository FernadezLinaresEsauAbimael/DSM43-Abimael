@extends('layouts.app')

@section('content')
<div class="container">

<h1> Editar Usuario </h1>

    <form action=" {{ url('/tienda/'.$tienda->id ) }} " method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('tienda.form')
        
    </form>

</div>
@endsection