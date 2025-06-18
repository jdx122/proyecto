    @extends('layout')

    @section('styles')

    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
    <style>
      .error {
        color: red;
        font-size: 0.875em;
      }

      .img-category {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50px;
        box-shadow: 0 0 8px;
      }
    </style>
    @stop

    @section('title')
    <h2 class="page-title">
      Productos
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
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Slug</th>
          <th>Descripcion</th>
          <th>Valor</th>
          <th>Estado_producto</th>
          <th>Estado</th>
          <th>Categoria_id</th>
          <th>Usuario_id</th>
          <th>Ciudad_id</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $categoria)
        <tr>
          <td>
            @if ($categoria->imagen)
            <a href="{{ url('img/productos/' . $categoria->imagen) }}" data-lightbox="{{ $categoria->nombre }}" data-title="{{ $categoria->nombre }}">
              <img src="{{ url('img/productos/' . $categoria->imagen) }}" class="img-category">
            </a>

            @else
            <a href="{{ url('img/productos/avatar.png') }}" data-lightbox="{{ $categoria->nombre }}" data-title="{{ $categoria->nombre }}">
              <img src="{{ url('img/productos/avatar.png') }}" class="img-category">
            </a>
            @endif
          </td>
          <td>{{ $categoria->nombre }}</td>
          <td>{{ $categoria->slug }}</td>
          <td>{{ $categoria->descripcion }}</td>
          <td>{{ $categoria->valor }}</td>
          <td>{{ $categoria->estado_producto }}</td>
          <td>{{ $categoria->estado }}</td>
          <td>{{ $categoria->categoria_id }}</td>
          <td>{{ $categoria->usuario_id }}</td>
          <td>{{ $categoria->ciudad_id }}</td>


          <td>
          </td>
        </tr>
        @endforeach

    </table>
    @stop

    @section('modal')
    <form action="{{ url('producto') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


              <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del producto" autofocus required value="{{ old('nombre') }}">
                @error('nombre')
                <div class="error">{{ $message }}</div>
                @enderror
              </div>

              <div class="row">
                <div class="col-lg-6 mb-3">
                  <label class="form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Slug del producto" readonly required value="{{ old('slug') }}">
                  @error('slug')
                  <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-lg-6 mb-3">
                  <label class="form-label">imagen</label>
                  <input type="file" class="form-control" name="imagen" placeholder="Imagen del producto" accept="image/*">
                </div>

                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Valor</label>
                    <input type="text" class="form-control" name="valor" placeholder="Valor del producto" autofocus required value="{{ old('valor') }}">
                    @error('valor')
                    <div class="error">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label for="estado_producto" class="form-label">Estado del producto</label>
                    <select class="form-select" name="estado_producto" id="estado_producto" required>
                      <option value="">-- Selecciona una opción --</option>
                      <option value="nuevo">Nuevo</option>
                      <option value="poco uso">Poco uso</option>
                      <option value="usado">Usado</option>
                    </select>
                  </div>
                </div>


                <div class="col-lg-12">
                  <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <textarea class="form-control" rows="3" name="descripcion" value="{{ old('descripcion') }}"></textarea>
                    @error('descripcion')
                    <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

              </div>

              <div class="row gx-3 mb-4"> <!-- gx-3 = separación horizontal, mb-4 = margen inferior -->

                <div class="col-lg-4">
                  <label class="form-label">Categoria</label>
                  <input type="text" pattern="\d+" inputmode="numeric" class="form-control" name="categoria_id" placeholder="ID de la categoria" required value="{{ old('categoria_id') }}">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">Usuario</label>
                  <input type="text" pattern="\d+" inputmode="numeric" class="form-control" name="usuario_id" placeholder="ID del usuario" required value="{{ old('usuario_id') }}">
                </div>

                <div class="col-lg-4">
                  <label class="form-label">Ciudad</label>
                  <input type="text" pattern="\d+" inputmode="numeric" class="form-control" name="ciudad_id" placeholder="ID de la ciudad" required value="{{ old('ciudad_id') }}">
                </div>

              </div>
            </div>

            

            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Cancelar
                </a>
                <button class="btn btn-primary ms-auto">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
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

    </div>
    </div>
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

    <script src="{{ url('js/lightbox.min.js') }}"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const nombreInput = document.querySelector('input[name="nombre"]');
        const slugInput = document.querySelector('input[name="slug"]');

        // Evento que se dispara cada vez que escribes o borras algo en "nombre"
        nombreInput.addEventListener("input", function() {
          let valor = nombreInput.value;

          // Convertimos a slug:
          let slug = valor
            .toLowerCase()
            .normalize("NFD") // Elimina tildes
            .replace(/[\u0300-\u036f]/g, "") // Remueve diacríticos
            .replace(/[^a-z0-9\s-]/g, "") // Quita caracteres especiales
            .trim()
            .replace(/\s+/g, "-") // Reemplaza espacios por guiones
            .replace(/-+/g, "-"); // Quita guiones repetidos

          // Asignamos el slug generado al input slug
          slugInput.value = slug;
        });
      });
    </script>

    @stop