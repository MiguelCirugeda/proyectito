<div class="container">
    <form action="{{ route('resolverIncidencia', ['id' => $incidencia->id]) }}" method="POST">
        @csrf
        <div class="modal fade" id="resolverIncidencia{{ $incidencia->id }}" tabindex="-1" aria-labelledby="resolverIncidenciaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resolverIncidenciaLabel">Estado de la Incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Selecciona el nuevo estado para la incidencia '{{ $incidencia->titulo }}'</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="estado" value="resuelta" class="btn btn-success">Resuelta</button>
                        <button type="submit" name="estado" value="en proceso" class="btn btn-warning">En proceso</button>
                        <button type="submit" name="estado" value="no resuelta" class="btn btn-danger">No resuelta</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
