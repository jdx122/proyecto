    @extends('layout')
    
    @section('title')
      <h2 class="page-title">
        Comentarios
      </h2>
      
      <div class="col-auto ms-auto d-print-none">  
        <div class="btn-list">
          <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
            Nuevo
          </a>
        </div>
      </div>
    @stop
    
    
    
    @section('content')
    <table class="ui celled table">
        <trehead>
            <tr>
                
                <th>Descripcion</th>
                <th>Estado</th>
                <th>valoracion</th>
                
                

            </tr>
        </trehead>
        <tbody>
            @foreach ($data as $categoria)
            <tr>
                
                <td>{{ $categoria->descripcion }}</td>
                <td>{{ $categoria->estado }}</td>
                <td>{{ $categoria->valoracion }}</td>
                             
                
                <td>
                </td>
            </tr>
            @endforeach

    </table>
    @stop

    @section('modal')
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nueva Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="{{ url('categoria') }}" method="POST" enctype="multipart/form-data">
              @csrf

            


            <div class="mb-3">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria" autofocus>
            </div>            
            
            <div class="row">
                <div class="col-lg-6 mb-3">                  
                  <label class="form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Slug de la categoria" readonly>
                </div>
                
                <div class="col-lg-6 mb-3">
                    <label class="form-label">imagen</label>
                  <input type="file" class="form-control" name="imagen" placeholder="Imagen de la categoria" accept="image/*">
                </div>


              <div class="col-lg-12">
                <div class="mb-3">                  
                  <label class="form-label">Descripcion</label>
                  <textarea class="form-control" rows="3" name="descripcion"></textarea>
                </div>
              </div>
            </div>
            </form>
          </div>
          
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancelar
            </a>
            <a href="#" class="btn btn-primary ms-auto" id="btn-submit" onclick="document.querySelector('form').submit();">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>             
             Enviar
            </a>
          </div>
        </div>
      </div>
    </div>
    @stop
