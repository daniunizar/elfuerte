@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('edads.update', $edad)}}" method="POST" id="formularioEdads" name="formularioEdads">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" id="id" value="{{isset($edad->id)?$edad->id:''}}">
                <label for="">Id: {{isset($edad->id)?$edad->id:''}}</label>
                @include('admin.edads.form')  
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
