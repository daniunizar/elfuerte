@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <h1>Sexos</h1>
            <form action="{{route('sexos.index')}}" method="POST" id="formularioSexos" name="formularioSexos">
                @csrf
                @include('admin.sexos.form')  
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
