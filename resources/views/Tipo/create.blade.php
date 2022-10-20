@extends('layouts.app')

@section('content')
<div class="container">

<h1> Crear Usuario </h1>

    <form action="{{ url('/tipo') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('tipo.form')

        
        
    </form>
</div>
@endsection