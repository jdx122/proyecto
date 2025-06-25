    @extends('layout')


    @section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="{{ url('css/lightbox.min.css') }}">
    @stop

    @section('title')
      <div>
        <h2 class="page-title">
          Bienvenido, {{ Auth::user()->nombre }} a tu panel de control <br>
        </h2>
        <small class="text-muted">Rol [ {{ Auth::user()->rol }} ]</small>
      </div>
    @stop


    @section('content')

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
      @stop