<div class="form-group">
    <label for="concepto">Denominación del sexo</label>
    <input type="text" class="form-control" id="concepto" name="concepto" value="{{isset($sexo->concepto)?$sexo->concepto:''}}">
</div>
<a href="{{ route('sexos.index') }}" class="btn btn-secondary">Cancelar</a> <!--Este enlace lleva al método index del controlador Procedencias que retorna la vista procedencias.index con el listado de procedencias-->
