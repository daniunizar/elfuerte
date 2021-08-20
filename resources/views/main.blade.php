@extends('layouts.app')

@section('content')
<a href="{{route('grupos.index')}}" class="badge badge-primary">Grupos</a>
<a href="{{route('visitantes.index')}}" class="badge badge-primary">Visitantes</a>
<a href="#" class="badge badge-primary">Venta de Entradas</a>
<a href="#" class="badge badge-primary">Venta de Productos Promocionales</a>
<a href="#" class="badge badge-primary">Consultas</a>
<a href="#" class="badge badge-primary">Reservas</a>
<a href="{{route('panel_administrador')}}" class="badge badge-primary">Administrador</a>
<a href="{{route('informes')}}" class="badge badge-primary">Informes</a>

@endsection
