@extends('layouts.app')

@section('content')
<a href="{{route('grupos.index')}}" class="badge badge-primary">Visitantes</a>
<a href="#" class="badge badge-primary">Entradas</a>
<a href="#" class="badge badge-primary">Productos Promocionales</a>
<a href="#" class="badge badge-primary">Consultas</a>
<a href="#" class="badge badge-primary">Reservas</a>
<a href="{{route('procedencias.index')}}" class="badge badge-primary">Administrador</a>

@endsection
