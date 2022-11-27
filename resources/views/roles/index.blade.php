@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dsmissible" rote="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif




<a href="{{ url('roles/create') }}" class="btn btn-success" > Registrar un nuevo Tipo</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
        @can('crear-rol')
            <a class="btn btn-warnign" href="{{ route('roles.create }}"></a>
        @endcan
    
    </tbody>

</table>
{!! $tipos->links() !!}

</div>
@endsection