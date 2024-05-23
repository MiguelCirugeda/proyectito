<div class="container">
    <form action="{{ route('perfil.update', ['id' => $usuario->id]) }}" method="POST">
        @method('PUT')
        @csrf
         <div class="modal fade " id="editarContra{{ $usuario->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarContra">Editar contraseña</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="contrasena1" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="contrasena1" name="contrasena1">
                        </div>

                        <div class="mb-3">
                            <label for="contrasena2" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="contrasena2" name="contrasena2">
                        </div>
                        {{-- @error('contrasena2')
                           
                               <p style="color: red"> No se puede cambiar la contraseña</p>
                            
                        @enderror --}}
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
