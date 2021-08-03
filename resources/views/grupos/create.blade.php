@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('grupos.index')}}" method="POST" id="formularioGrupos" name="formularioGrupos">
                @csrf
                @include('grupos.form')
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
@endsection