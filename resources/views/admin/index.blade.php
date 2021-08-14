@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Panel de Administrador</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('procedencias.index')}}" class="badge badge-primary">Procedencias</a>
            <a href="{{route('sexos.index')}}" class="badge badge-primary">Identidades de Género</a>
            <a href="{{route('edads.index')}}" class="badge badge-primary">Rangos de Edad</a>
            <a href="#" class="badge badge-primary">Consultas</a>
            <a href="#" class="badge badge-primary">Productos</a>
            <a href="#" class="badge badge-primary"></a>
        </div>
    </div>
</div>

@endsection
