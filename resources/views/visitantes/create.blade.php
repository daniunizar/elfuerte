@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <form action="{{route('visitantes.index')}}" method="POST" id="formularioVisitantes" name="formularioVisitantes">
                @csrf
                @include('visitantes.form')
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
</div>
@endsection