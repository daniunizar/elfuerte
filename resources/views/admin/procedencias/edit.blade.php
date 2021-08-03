@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('procedencias.update', $procedencia)}}" method="POST" id="formularioGrupos" name="formularioGrupos">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" id="id" value="{{isset($procedencia->id)?$procedencia->id:''}}">
                <label for="">Id: {{isset($procedencia->id)?$procedencia->id:''}}</label>
                @include('admin.procedencias.form')  
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
