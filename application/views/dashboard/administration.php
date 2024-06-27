<style>

    .tox-tinymce{
        height: 200px;    
    }

    .link-style {
        color: #007bff;
        text-decoration: none;
        cursor: pointer;
    }
    .link-style:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    .link-style:focus, .link-style:active {
        color: #0056b3;
        text-decoration: underline;
    }
</style>

<div class="content-header">
    <div class="container-fluid" hidden>
        <div class="row mt-2">
            <div class="col-sm-12 text-center" style="color:#00675b">
                <h1 class="m-0 ml-4 text-bold">BIENVENIDO AL SISTEMA DE GESTIÓN Y DESPLIEGUE</h1>
                <h1 class="m-0 ml-4 text-bold">CONTENIDO EDUCATIVO</h1>
            </div>
        </div>
    </div>
</div>

<section class="content mt-5">
    <div>
        <h2 class="text-center text-muted">Pantalla De Administración</h2>
        <div class="container">
            <div class="d-flex justify-content-end my-3">
                <a class="btn btn-primary" data-toggle="modal" data-target="#formularioModal">Agregar Artículo</a>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <table class="table table-striped table-bordered" >
                        <thead class="text-center">
                            <th>Articulo</th>
                            <th>Nombre</th>
                            <th >Imagen</th>
                            <th>Acciones</th>
                        </thead>      
                        <tbody class="text-center" id="tbody">
                            
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section>


<!-- Modal Registrar | Editar -->
<div class="modal fade" id="formularioModal" tabindex="-1" role="dialog" aria-labelledby="formularioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form">
            <div class="form-group ">
                    <input type="text" value="" id="id_producto" hidden>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="staticTitulo" class="form-label">Titulo: </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="titulo" value="" required>
                    </div>
                    
                    <div class="col-sm-3 mt-2">
                        <label for="palabrasClave">Palabras Clave: </label>
                    </div>
                    <div class="col-sm-9 mt-2">
                        <textarea class="form-control" id="palabrasClave" rows="2"></textarea>
                    </div>

                    <div class="col-sm-3 mt-2">
                        <label for="staticAreaConocimiento" class="form-label">Área de Conocimiento: </label>
                    </div>
                    <div class="col-sm-9 mt-2">
                        <input type="text" class="form-control" id="areaConocimiento" value="" required>
                    </div>

                    <div class="col-sm-3 mt-2">
                        <label for="staticTipoContenido" class="form-label">Tipo de Contenido: </label>
                    </div>
                    <div class="col-sm-9 mt-2">
                        <input type="text" class="form-control" id="tipoContenido" value="" >
                    </div>


                    <div class="col-sm-3 mt-2">
                        <label for="staticImagenPortada" class="form-label">Imagen de Portada: </label>
                    </div>    
                    <div class="col-sm-9 mt-2">
                        <input type="file" class="form-control" id="imagenPortada" value="" >
                    </div>

                    <div class="col-sm-3 mt-2">
                        <label for="staticImagenPrevia" class="form-label">Imagen previa: </label>
                    </div>    
                    <div class="col-sm-9 mt-2">
                        <input type="file" class="form-control" id="imagenPrevia" value="" >
                    </div>

                    <div class="col-sm-3 mt-2">
                        <label for="staticDescripcion" class="form-label">Descripción: </label>
                    </div>
                    <div class="col-sm-9 mt-2">
                        <textarea class="form-control tinymce" id="descripcion" rows="2" style="height: 200px;"></textarea>
                    </div>

                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSave"><i class="fas fa-check mr-2"></i>Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Ver Producto -->
<div class="modal fade" id="showProductModal" tabindex="-1" role="dialog" aria-labelledby="formularioModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información del Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        
      </div>
    </div>
  </div>
</div>


