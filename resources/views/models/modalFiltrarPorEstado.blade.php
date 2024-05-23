<div class="container">
  <form action="{{ route('verIncidencias_filtradas') }}" method="POST">
      @csrf
      <div class="modal fade" id="incidenciasFiltrar" tabindex="-1" aria-labelledby="filtrarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="filtrarModalLabel">Filtrar Incidencias</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <select class="form-select" id="usuario" name="usuario">
                  <option value="">Ninguno</option>
                  <!-- Suponiendo que tienes una variable $usuarios que contiene los usuarios -->
                  @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado">
                   <option value="">Ninguno</option> 
                  <option value="no resuelta">No Resuelta</option>
                  <option value="en proceso">En Proceso</option>
                  <option value="resuelta">Resuelta</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="prioridad" class="form-label">Prioridad</label>
                <select class="form-select" id="prioridad" name="prioridad">
                  <option value="">Ninguna</option> 
                  <option value="prioridad alta">Prioridad Alta</option>
                  <option value="prioridad media">Prioridad Media</option>
                  <option value="prioridad baja">Prioridad Baja</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
