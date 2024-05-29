<div class="container">
<form action="{{ route('responderComentario', ['id' => $incidencia->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="comentario_padre_id" value="{{ $comentario->id }}">
    <div class="modal fade" id="comentarioRespuesta{{ $comentario->id }}" tabindex="-1" aria-labelledby="comentarioRespuestaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comentarioRespuestaLabel">Comentario </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Responder al comentario</label>
                        <textarea class="form-control" id="comentario" name="texto_comentario" rows="6"
                            placeholder="Introducir comentario"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Responder comentario</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>