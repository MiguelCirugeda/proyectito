
<div class="container">
    <form action="{{ route('insertarCorreo') }}" method="POST">
      
        @csrf
        <div class="modal fade" id="contestarCorreo{{ $correo->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">
                Respuesta a 
                @if($correo->usuarioRemitente)
                    {{ $correo->usuarioRemitente->nombre }}
                @else
                    (No hay nombre asociado)
                @endif
                de 
                @if($usuario)
                    {{ $usuario->nombre }}
                @else
                    (No hay nombre asociado)
                @endif
            </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                <div class="mb-3">
                  <label for="titulo" class="form-label">Asunto</label>
                  <input type="text" class="form-control" id="asunto" name="asunto">
                </div>
                <div class="mb-3">
                  <label for="descripcion" class="form-label">Contenido</label>
                  <textarea class="form-control" id="contenido" name="contenido" rows="5"></textarea>
                </div>
                
                
                <input type="hidden" name="estado" value="no leido">
                <input type="hidden" id="usuario" name="usuario" value="{{ $correo->id_usuario_remitente }}">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>