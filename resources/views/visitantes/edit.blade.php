@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('visitantes.update', $visitante)}}" method="POST" id="formularioVisitantes" name="formularioVisitantes">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                <label for="">Id: {{isset($visitante->id)?$visitante->id:''}}</label>
                <input type="hidden" id="id" value="{{isset($visitante->id)?$visitante->id:''}}">
                </div>
                <div class="form-group">
                <label for="lote_id">Grupo</label>
                <input type="number" id="lote_id" name="lote_id" value="{{isset($visitante->lote_id)?$visitante->lote_id:''}}">
                </div>
                <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" id="dia" name="dia" value="{{isset($fecha_visita)?$fecha_visita:''}}">
                <input type="time" id="hora" name="hora" value="{{isset($hora_visita)?$hora_visita:''}}">
                </div>
                <div class="form-group">
                <label for="sexo_id">Sexo</label>
                <select id="sexo_id" name="sexo_id" value="{{isset($visitante->sexo_id)?$visitante->sexo->concepto:''}}">
                @foreach($sexos as $sexo)
                    @if($visitante->sexo_id == $sexo->id)
                    <option value="{{$sexo->id}}" selected>{{$sexo->concepto}}</option>
                    @else
                    <option value="{{$sexo->id}}">{{$sexo->concepto}}</option>
                    @endif
                @endforeach
                </select>
                </div>
                <div class="form-group">
                <label for="edad_id">Rango de edad</label>
                <select id="edad_id" name="edad_id" value="{{isset($visitante->edad_id)?$visitante->edad->concepto:''}}">
                @foreach($edads as $edad)
                    @if($visitante->edad_id == $edad->id)
                    <option value="{{$edad->id}}" selected>{{$edad->concepto}}</option>
                    @else
                    <option value="{{$edad->id}}">{{$edad->concepto}}</option>
                    @endif
                @endforeach
                </select>       
                </div>
                <div class="form-group">
                    <label for="procedencia">Procedencia</label>
                    <select class="form-control" id="procedencia_id" name="procedencia_id">
                    <optgroup label="Internacional" name="procedencia_inter" id="procedencia_inter"> 
                        @foreach($listado_procedencias_internacionales as $procedencia_internacional)
                            @if($visitante->procedencia_id == $procedencia_internacional->id)
                                <option value="{{$procedencia_internacional->id}}" selected>{{$procedencia_internacional->concepto}}</option>
                            @else
                            <option value="{{$procedencia_internacional->id}}">{{$procedencia_internacional->concepto}}</option>
                            @endif
                        @endforeach
                    </optgroup> 
                    <optgroup label="Nacional" name="procedencia_nacional" id="procedencia_nacional"> 
                        @foreach($listado_procedencias_nacionales as $procedencia_nacional)
                        @if($visitante->procedencia_id == $procedencia_nacional->id)
                        <option value="{{$procedencia_nacional->id}}" selected>{{$procedencia_nacional->concepto}}</option>
                        @else
                        <option value="{{$procedencia_nacional->id}}">{{$procedencia_nacional->concepto}}</option>
                        @endif
                        @endforeach
                    </optgroup> 
                    </select>
                </div>
                <a href="{{ route('visitantes.index') }}" class="btn btn-secondary">Cancelar</a> <!--Este enlace lleva al método index del controlador Grupos que retorna la vista grupos.index con el listado de grupos-->
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
