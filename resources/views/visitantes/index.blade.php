@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Visitantes</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12" >
                <a href="{{route('visitantes.create')}}"class="btn btn-primary">Nuevo Registro</a>
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Lote</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Procedencia</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $visitante)
                <tr>
                    <th scope="row">{{$visitante->id}}</th>
                    <td>{{$visitante->lote->fecha}}</td>
                    <td>{{$visitante->lote_id}}</td>
                    <td>{{$visitante->sexo->concepto}}</td>
                    <td>{{$visitante->edad->concepto}}</td>
                    <td>{{$visitante->procedencia->concepto}}</td>
                    <td>
                        <a href="{{route('visitantes.edit', $visitante->id)}}" class="btn btn-warning">Editar</a>    
                    <td>
                        <form action="{{route('visitantes.destroy', $visitante->id)}}" method='POST'>
                        @csrf
                        {{method_field('DELETE')}}
                            <input type="submit" id="btn_delete" class="btn btn-danger" value="Eliminar"></input></td>
                        </form>    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
