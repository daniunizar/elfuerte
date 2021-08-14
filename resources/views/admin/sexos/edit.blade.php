@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('sexos.update', $sexo)}}" method="POST" id="formularioSexos" name="formularioSexos">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" id="id" value="{{isset($sexo->id)?$sexo->id:''}}">
                <label for="">Id: {{isset($sexo->id)?$sexo->id:''}}</label>
                @include('admin.sexos.form')  
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
