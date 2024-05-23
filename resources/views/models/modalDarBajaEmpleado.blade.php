
    <div class="container">
        <form action="{{ route('darBaja', ['id' => $usuario->id]) }}" method="POST">
            @method( 'DELETE' )
            @csrf
            <div class="modal fade" id="deleteUsuario{{ $usuario->id }}" tabindex="-1" aria-labelledby="deleteUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteUsuarioLabel">Hacer Técnico</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar al usuario <span class="text" style="color: rgb(232, 5, 5)">{{$usuario->nombre}}</span>?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Eliminar usuario</button>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
    
    