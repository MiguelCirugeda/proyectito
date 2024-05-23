
<div class="container">
<form action="{{ route('incidencia.update', ['id' => $incidencia->id]) }}" method="POST">
    @method( 'PUT' )
    @csrf
    <div class="modal fade" id="editModal{{ $incidencia->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Editar Incidencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" value="{{$incidencia->titulo}}" name="titulo">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$incidencia->descripcion}}</textarea>
            </div>

            <div class="mb-3">
              <label for="prioridad" class="form-label">Categoria</label>
              <select class="form-select" id="categoria" name="categoria">
                <option value="software" {{ $incidencia->categoria == 'software' ? 'selected' : '' }}>Software</option>
                <option value="hardware" {{ $incidencia->categoria == 'hardware' ? 'selected' : '' }}>Hardware</option>
                <option value="redes" {{ $incidencia->categoria == ' redes' ? 'selected' : '' }}>Redes</option>
                <option value="otros" {{ $incidencia->categoria == ' otros' ? 'selected' : '' }}>Otros</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" id="prioridad" name="prioridad">
                <option value="prioridad alta" {{ $incidencia->prioridad == 'prioridad alta' ? 'selected' : '' }}>Prioridad Alta</option>
                <option value="prioridad media" {{ $incidencia->prioridad == 'prioridad media' ? 'selected' : '' }}>Prioridad Media</option>
                <option value="prioridad baja" {{ $incidencia->prioridad == 'prioridad baja' ? 'selected' : '' }}>Prioridad Baja</option>
              </select>
            </div>

            <!-- Añade aquí más campos si es necesario -->
            <input type="hidden" id="incidenciaId">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>