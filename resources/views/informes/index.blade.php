@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Generación de Informes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('informes.informar')}}" method="GET">
                <label for="fecha_inicio">Fecha de inicio: <input type="date" name="inicio" id="inicio" value=""></label>
                
                <label for="fecha_final">Fecha de fin: <input type="date" name="final" id="final"></label>
                
                <input type="submit" value="Solicitar Informe">
            </form>
        </div>
    </div>
</div>

@endsection