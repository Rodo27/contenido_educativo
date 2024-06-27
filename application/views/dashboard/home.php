<style>
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
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-sm-12 text-center" style="color:#00675b">
                <h1 class="m-0 ml-4 text-bold">BIENVENIDO AL SISTEMA DE GESTIÓN Y DESPLIEGUE</h1>
                <h1 class="m-0 ml-4 text-bold">CONTENIDO EDUCATIVO</h1>
            </div>
        </div>
    </div>
</div>



<section class="content mt-3">
    <div>
        <h4 class="text-center text-muted">Pantalla Principal</h4>
        <p class="text-center">Despliega los seis últimos articulos ordenados por fecha, mostrando una imagen previa (thumnail), el titulo del contenido y una breve descripción</p>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <table class="table table-striped table-bordered" >
                        <thead class="text-center">
                            <th>Nombre</th>
                            <th >Imagen</th>
                        </thead>      
                        <tbody class="text-center" id="tbody">
                            
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section>


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


