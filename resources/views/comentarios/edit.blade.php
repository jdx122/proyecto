@extends('layout')


@section('styles')
<link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
<style>
    .error {
        color: red;
        font-size: 0.875em;

    }

    .card {
        background-color: rgb(223, 239, 255);
        margin: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .star-rating {
        direction: rtl;
        unicode-bidi: bidi-override;
    }

    .star-rating input[type="radio"] {
        display: none;
    }

    .star-rating label {
        font-size: 2rem;
        color: #ccc;
        cursor: pointer;
        padding: 0 3px;
        transition: color 0.2s;
    }

    .star-rating input[type="radio"]:checked~label,
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: gold;
    }
</style>
@stop

@section('title')
<h2 class="page-title">
    Editar Comentario
</h2>

<div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
        <a href="{{ url('comentario') }}" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left-dashed">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12h6m3 0h1.5m3 0h.5" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
            </svg>
            Volver
        </a>
    </div>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('comentario.update', $comentario->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $comentario->id }}">


            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <textarea class="form-control" rows="3" name="descripcion"> {{ old('comentario', $comentario->comentario) }}</textarea>
                    @error('comentario')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
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
                    <div class="star-rating d-flex flex-row-reverse justify-content-start">
                        @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="valoracion{{ $i }}" name="valoracion" value="{{ $i }}" {{ old('valoracion') == $i ? 'checked' : '' }}>
                        <label for="valoracion{{ $i }}">&#9733;</label>
                        @endfor
                    </div>
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

                <div class="col-lg-4">
                  <label class="form-label">Usuario</label>
                  <select name="usuario_id" class="form-control" required>
                    <option value="">-- Selecciona un usuario --</option>
                    @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                  </select>
                </div>
            </div>

    </div>

</div>

<div class="mt-3">
    <a href="{{ url('comentario') }}" class="btn btn-link link-secondary">
        Cancelar
    </a>
    <button class="btn btn-primary ms-auto">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 14l11 -11" />
            <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
        </svg>
        Actualizar
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