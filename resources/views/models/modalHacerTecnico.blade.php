<div class="container">
    <form action="{{ route('hacerTecnico', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        <div class="modal fade" id="hacerTecnicoModal{{ $usuario->id }}" tabindex="-1"
            aria-labelledby="hacerTecnicoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hacerTecnicoModalLabel">Hacer Técnico</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea hacer técnico a '{{ $usuario->nombre }}'?</p>
                        Tipo de técnico
                        <select name="tipo_tecnico" class="form-select ">
                            <option value="">No técnico</option>
                            <option value="tecnico de software">Técnico de Software</option>
                            <option value="tecnico de hardware">Técnico de Hardware</option>
                            <option value="tecnico de redes">Técnico de Redes</option>
                            <option value="tecnico de sistemas">Técnico de Sistemas</option>
                            <option value="direccion">Dirección</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        @if ($usuario->tipo_tecnico)
                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#hacerTecnicoModal{{ $usuario->id }}"
                                data-id="{{ $usuario->id }}">Cambiar tipo de técnico</button>
                        @else
                            <button type="submit" class="btn btn-warning " data-bs-toggle="modal"
                                data-bs-target="#hacerTecnicoModal{{ $usuario->id }}"
                                data-id="{{ $usuario->id }}">Hacer técnico</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
