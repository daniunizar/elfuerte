@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('visitantes.update', $visitante)}}" method="POST" id="formularioVisitantes" name="formularioVisitantes">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" id="id" value="{{isset($visitante->id)?$visitante->id:''}}">
                <label for="">Id: {{isset($visitante->id)?$visitante->id:''}}</label>
                @include('visitantes.form')
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
