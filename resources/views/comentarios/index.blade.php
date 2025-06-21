    @extends('layout')

    @section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">

    @section('title')
    <h2 class="page-title">
      Comentarios
    </h2>

    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
          </svg>
          Nuevo
        </a>
      </div>
    </div>
    @stop



    @section('content')
    <table class="ui celled table">
      <thead>
        <tr>

          <th>Descripcion</th>
          <th>Estado</th>
          <th>valoracion</th>
          <th>Acciones</th>



        </tr>
      </thead>
      <tbody>
        @foreach ($data as $comentario)
        <tr>

          <td>{{ $comentario->descripcion }}</td>
          <td>
            @if($comentario->estado == 1)
            <span class="badge bg-green text-white">Activo</span>
            @else
            <span class="badge bg-red text-white">Inactivo</span>
            @endif
          </td>
          <td>{{ $comentario->valoracion }}</td>
          <td></td>
        </tr>
        @endforeach

    </table>
    @stop
    <form action="{{ url('comentario') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @section('modal')
      <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Comentario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="3" name="descripcion" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                <div class="col-lg-6 mb-3">
                  <label class="form-label">Estado</label>
                  <select class="form-control" name="estado" required>
                    <option value="">Seleccione estado</option>
                    <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                  </select>
                  @error('estado')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-lg-6 mb-3">
                  <label class="form-label">Valoración</label>
                  <select class="form-control" name="valoracion" required>
                    <option value="">Seleccione valoración</option>
                    @for($i = 1; $i <= 5; $i++)
                      <option value="{{ $i }}" {{ old('valoracion') == $i ? 'selected' : '' }}>
                      {{ $i }} -
                      @if($i == 1) Muy malo
                      @elseif($i == 2) Malo
                      @elseif($i == 3) Regular
                      @elseif($i == 4) Bueno
                      @elseif($i == 5) Excelente
                      @endif
                      </option>
                      @endfor
                  </select>
                  @error('valoracion')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 mb-3">
                  <label class="form-label">Producto</label>
                  <input type="text" class="form-control" name="producto_id" placeholder="ID del producto" required value="{{ old('producto_id') }}">
                  @error('producto_id')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-lg-6 mb-3">
                  <label class="form-label">Usuario</label>
                  <select name="usuario_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                      {{ $usuario->name }}
                    </option>
                    @endforeach
                  </select>
                  @error('usuario_id')
                  <div class="error text-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
            </div>

            <div class="modal-footer">
              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancelar</a>
              <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="icon icon-tabler icon-tabler-send">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 14l11 -11" />
                  <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                </svg>
                Enviar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    @stop

    @section('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.table').DataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json"
          },
          "order": [
            [1, "asc"]
          ] // Ordenar por la primera columna (nombre)
        });
      });
    </script>

    @if($errors->any())
    <script>
      $(document).ready(function() {
        $('#modal-report').modal('show');
      });
    </script>
    @endif
    @stop