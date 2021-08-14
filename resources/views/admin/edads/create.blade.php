@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <h1>Rangos de Edad</h1>
            <form action="{{route('edads.index')}}" method="POST" id="formularioEdads" name="formularioEdads">
                @csrf
                @include('admin.edads.form')  
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
