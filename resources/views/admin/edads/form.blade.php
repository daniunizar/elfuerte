<div class="form-group">
    <label for="concepto">Denominación del rango de edad</label>
    <input type="text" class="form-control" id="concepto" name="concepto" value="{{isset($edad->concepto)?$edad->concepto:''}}">
    <input type="number" class="form-control" id="orden" name="orden" value="{{isset($edad->orden)?$edad->orden:''}}">
</div>
<a href="{{ route('edads.index') }}" class="btn btn-secondary">Cancelar</a> <!--Este enlace lleva al método index del controlador Procedencias que retorna la vista procedencias.index con el listado de procedencias-->
