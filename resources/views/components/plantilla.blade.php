@php
    $usuario = Auth::User();
@endphp
<style>
  .bg-red {
      background-color: rgba(3, 37, 122, 0.833);
      border-radius: 10px;
      
  }
  .bg-body-tertiary {
      background-color: #fdfffb; 
      border-radius: 10px;
      
      
  }
 
</style>
<div class="container">
  <nav class="navbar navbar-expand-lg {{ $usuario && $usuario->esTecnico == 1 ? 'bg-red' : 'bg-body-tertiary' }}">
        <div class="container-fluid">
          <a class="navbar-brand {{ $usuario && $usuario->esTecnico == 1 ? 'text-white' : '' }}" href="{{route('principal', ['id' => auth()->id()])}}">Incidencias informáticas</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle {{ $usuario && $usuario->esTecnico == 1 ? 'text-white' : '' }}" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Incidencias
                </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('vistaCrearIncidencia', ['id' => auth()->id()])}}">Crear una incidencia</a></li>

                      <a class="dropdown-item" href="{{route('verIncidencias', ['id' => auth()->id()])}}">
                        Ver las incidencias
                        @if($usuario && $usuario->esTecnico == 1)
                            y resolverlas
                        @endif
                    </a>
                    <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('vista_ModificarIncidencia', ['id' => auth()->id()])}}">Modificar una incidencia</a></li>
                      @if($usuario && $usuario->esTecnico == 1)
                      <li><a class="dropdown-item" href="{{route('vista_EliminarIncidencia', ['id' => auth()->id()])}}">Eliminar una incidencia</a></li>
                      @endif

                   
                    </ul>
                  </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ $usuario && $usuario->esTecnico == 1 ? 'text-white' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Perfil
                  @auth
                  @endauth
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('miPerfil', ['id' => auth()->id()])}}">Ver mi perfil</a></li>
                  
                  @if($usuario && $usuario->esTecnico == 1)
                  <li><a class="dropdown-item" href="{{route('listadoUsuariosTecnico', ['id' => auth()->id()])}}">Hacer tecnico a un empleado</a></li>
                  @endif
                  <li><a class="dropdown-item" href="{{route('vistaDarmeBaja', ['id' => auth()->id()])}}">Dar de baja mi perfil</a></li>
                  @if($usuario && $usuario->esTecnico == 1)
                  <li><a class="dropdown-item" href="{{route('listadoEmpleados', ['id' => auth()->id()])}}">Dar de baja a un empleado</a></li>
                  @endif
                  @if($usuario && $usuario->esTecnico == 1)
                  <li><a class="dropdown-item" href="{{route('listaCodigos', ['id' => auth()->id()])}}">Ver todos los codigos</a></li>
                  @endif
                  <li><a class="dropdown-item" href="{{route('vistaCorreo', ['id' => auth()->id()])}}">Ver mi correo</a></li>
                  
                 
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active {{ $usuario && $usuario->esTecnico == 1 ? 'text-white' : '' }}" aria-current="page" href="{{route('contactoUsuario', ['id' => auth()->id()])}}">Contacto</a>
                
              </li>
            </ul>
            <form action="{{route('logout')}}" method="POST" class="form-inline align-items-center">
              @csrf
              <div class="row">
                <div class="col-auto my-auto {{ $usuario && $usuario->esTecnico == 1 ? 'text-white' : '' }}">
                  <h6>{{ $usuario && $usuario->esTecnico == 1 ? 'TÉCNICO ' : 'EMPLEADO ' }}{{ auth()->user()->nombre }} conectado </h6>
              </div>
                  <div class="col-auto">
                      <input class="btn btn-primary ms-auto" type="submit" value="Cerrar sesion">
                  </div>
              </div>
          </form>
          
          </div>
          
        </div>
      </nav>
</div>