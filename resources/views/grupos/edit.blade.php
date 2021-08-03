@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('grupos.update', $grupo)}}" method="POST" id="formularioGrupos" name="formularioGrupos">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" id="id" value="{{isset($grupo->id)?$grupo->id:''}}">
                <label for="">Id: {{isset($grupo->id)?$grupo->id:''}}</label>
                <input type="date" id="fecha_vis" name="fecha_vis" value="{{isset($fecha_visita)?$fecha_visita:'Aquí iría la fecha'}}">
                <input type="time" id="hora_vis" name="hora_vis" value="{{isset($hora_visita)?$hora_visita:'Aquí iría la hora'}}">
                @include('grupos.form')
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
