<?php include "Views/Tamplates/header.php"; ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Clientes</a>
</div>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="frmCliente();">Agregar Nuevo Cliente</button>

<div class="table-responsive">
    <table class="table table-primary" id="tblClientes">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Dni</th>
                <th scope="col">Nombre</th>
                <th scope="col">telefono</th>
                <th scope="col">direccion</th>
                <th scope="col">Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="nuevo_cliente" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmCliente" method="post">
                    <div class="mb-3">
                      <label for="dni" class="form-label">Dni</label>
                      <input type="hidden" id="id" name="id">
                      <input type="text" name="dni" id="dni" class="form-control" placeholder="Documento de identidad" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del dni" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="telefono" class="form-label">Telefono</label>
                      <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="direccion" class="form-label">Direccion</label>
                      <textarea class="form-control" name="direccion" id="direccion" placeholder="Direccion" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="registrarCli(event);"  id="btnAccion">Registrar</button>
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