<?php include "Views/Tamplates/header.php"; ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Productos</a>
</div>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="frmProducto()">Agregar Nuevo Producto</button>

<div class="table-responsive">
    <table class="table table-primary" id="tblProductos">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Foto</th>
                <th scope="col">Codigo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="nuevo_producto" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmProducto" method="post">
                    <div class="mb-3">
                      <label for="codigo" class="form-label">Codigo de barras</label>
                      <input type="hidden" id="id" name="id">
                      <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo de barras" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Descripcion</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Producto" aria-describedby="helpId">
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                              <label for="" class="form-label">Precio Compra</label>
                              <input type="precio_compra" name="precio_compra" id="precio_compra" class="form-control" placeholder="Precio Compra" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                              <label for="" class="form-label">Precio Venta</label>
                              <input type="precio_venta" name="precio_venta" id="precio_venta" class="form-control" placeholder="Precio Venta" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                        
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                          <label  class="form-label">Foto</label>
                          <div class="card border-primary">
                            <div class="card-body">
                            <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image "></i></label>
                                <span id="icon-cerrar"></span>
                                <input type="file" class="d-none" name="imagen" id="imagen" onchange="preview(event)" placeholder="" aria-describedby="fileHelpId">
                                <input type="hidden" id="foto_actual" name="foto_actual">
                                <img id="img-preview" class="img-fluid rounded-top" alt="">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-3" >
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="registrarPro(event);"  id="btnAccion">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
   
</script>
</div>
<?php include "Views/Tamplates/footer.php"; ?>