@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Tipos de Sexos</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12" >
                <a href="{{route('sexos.create')}}"class="btn btn-primary">Nuevo Tipo de Sexo</a>
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Orden de aparición</th>
                    <th scope="col">Sexo</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $sexo)
                <tr>
                    <th scope="row">{{$sexo->id}}</th>
                    <td>{{$sexo->orden}}</td>
                    <td>{{$sexo->concepto}}</td>
                    <td>
                        <a href="{{route('sexos.edit', $sexo->id)}}" class="btn btn-warning">Editar</a>    
                    <td>
                        <form action="{{route('sexos.destroy', $sexo->id)}}" method='POST'>
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
