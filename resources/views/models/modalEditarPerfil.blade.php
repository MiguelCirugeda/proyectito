
<div class="container">
    <form action="{{ route('perfil.update', ['id' => $usuario->id]) }}" method="POST">
        @method( 'PUT' )
        @csrf
        <div class="modal fade" id="editarPerfil{{ $usuario->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editarPerfil">Editar perfil</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              
            </div>
            <div class="modal-body">
             
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" value="{{$usuario->nombre}}" name="nombre">
                </div>
                <div class="mb-3">
                  <label for="apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="apellido" value="{{$usuario->apellido}}" name="apellido">
                </div>
    
                <div class="mb-3">
                  <label for="categoria" class="form-label">Categoria</label>
                  <select class="form-select" id="categoria" name="categoria">
                    <option value="diseñador" {{ $usuario->categoria_usuario == 'diseñador' ? 'selected' : '' }}>Diseñador</option>
                    <option value="programador" {{ $usuario->categoria_usuario == 'programador' ? 'selected' : '' }}>Programador</option>
                    <option value="sistema" {{ $usuario->categoria_usuario == ' sistema' ? 'selected' : '' }}>Sistema</option>
                    <option value="direccion" {{ $usuario->categoria_usuario == ' direccion' ? 'selected' : '' }}>Direccion</option>
                  </select>
                </div>
    
    
                
              
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