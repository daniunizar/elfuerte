@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <h1>Lugares de Procedencia</h1>
            <form action="{{route('procedencias.index')}}" method="POST" id="formularioProcedencias" name="formularioProcedencias">
                @csrf
                @include('admin.procedencias.form')  
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
