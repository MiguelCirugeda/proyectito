<div class="container">
    <!-- Inicio del formulario que envuelve el modal -->
    <form action="{{ route('darmeBaja', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        <!-- Campo de contraseña oculto -->
        <input type="hidden" name="contrasena1" value="{{ $contrasena1 }}">

        <!-- Inicio del modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="deleteUserModalLabel">Contraseña ingresada con éxito</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que quieres darte de baja?</p>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar baja</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
