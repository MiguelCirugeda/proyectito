<div class="container">
    <form action="{{ route('insertarComentario', ['id' => $incidencia->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="modal fade" id="comentarioModal{{ $incidencia->id }}" tabindex="-1"
            aria-labelledby="comentarioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="comentarioModalLabel">Comentario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario</label>
                            <textarea class="form-control" id="comentario" name="texto_comentario" rows="6"
                                placeholder="Introducir comentario"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir comentario</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>
