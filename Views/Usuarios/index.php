<?php include "Views/Tamplates/header.php"; ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Usuarios</a>
</div>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="frmUsuario()">Agregar Nuevo Usuario</button>

<div class="table-responsive">
    <table class="table table-primary" id="tblUsuarios">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Caja</th>
                <th scope="col">Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="nuevo_usuario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frmUsuario" method="post">
                    <div class="mb-3">
                      <label for="usuario" class="form-label">Usuario</label>
                      <input type="hidden" id="id" name="id">
                      <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del usuario" aria-describedby="helpId">
                    </div>
                    <div class="row" id="claves">
                        <div class="col-md-9">
                            <label for="clave" class="form-label">Contrasena</label>
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Ingrese contrasena" aria-describedby="helpId">
                        </div>
                        <div class="col-md-9">
                            <label for="confirmar" class="form-label">Confirmar contrasena</label>
                            <input type="password" name="confirmar" id="confirmar" class="form-control" placeholder="Confirmar contrasena" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="caja" class="form-label">Caja</label>
                        <select class="form-select form-select-lg" name="caja" id="caja">
                        <?php foreach ($data['cajas'] as $row) {?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['caja'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="registrarUser(event);"  id="btnAccion">Registrar</button>
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