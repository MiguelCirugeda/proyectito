<div class="container">
    <form action="{{ route('incidencia.delete', ['id' => $incidencia->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal fade" id="deleteModal{{ $incidencia->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Incidencia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            @if ($incidencia->usuarioSubio)
                                ¿Desea eliminar la incidencia de '{{ $incidencia->usuarioSubio->nombre }}', con el
                                título <span class="text"
                                    style="color: rgb(232, 5, 5)">{{ $incidencia->titulo }}</span>?
                            @else
                                ¿Desea eliminar esta incidencia sin nombre con el titulo <span class="text"
                                style="color: rgb(232, 5, 5)">{{ $incidencia->titulo }}</span>?
                            @endif
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
