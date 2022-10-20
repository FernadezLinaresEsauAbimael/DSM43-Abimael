@extends('layouts.app')

@section('content')
<div class="container">

<h1> Editar Tipos </h1>

    <form action=" {{ url('/tipo/'.$tipo->id ) }} " method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('tipo.form')
        
    </form>

</div>
@endsection
