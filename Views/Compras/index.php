<?php include "Views/Tamplates/header.php"; ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Nueva Compra</a>
</div>

<div class="card text-start">
  <div class="card-body">
    <form id="frmCompra">
       <div class="row">
         <div class="col-md-3">
            <div class="mb-3">
              <label for="codigo" class="form-label">Codigo de barras</label>
              <input type="hidden" id="id" name="id">
              <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo de barras" aria-describedby="helpId" onkeyup="buscarCodigo(event)">
            </div>
         </div>
         <div class="col-md-5">
            <div class="mb-3">
              <label for="nombre" class="form-label">Descripcion</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Descripcion del producto" disabled aria-describedby="helpId">
            </div>
         </div>
         <div class="col-md-2">
            <div class="mb-3">
              <label for="cantidad" class="form-label">Cant</label>
              <input type="number" name="cantidad" id="cantidad" class="form-control" onkeyup="calcularPrecio(event)" disabled aria-describedby="helpId">
            </div>
         </div>
         <div class="col-md-2">
            <div class="mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio compra" disabled aria-describedby="helpId">
            </div>
         </div>
         <div class="col-md-2">
            <div class="mb-3">
              <label for="sub_total" class="form-label">Sub Total</label>
              <input type="text" name="sub_total" id="sub_total" class="form-control" placeholder="Sub total" disabled aria-describedby="helpId">
            </div>
         </div>
       </div> 
       
    </form>
  </div>
</div>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Sub Total</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="tblDetalle">
    </tbody>
</table>
<div class="row">
    <div class="col-md-4 ml-auto">
            <div class="col-md-12">
                <div class="mb-3">
                <label for="total" class="form-label mt-3">Total</label>
                <input type="text" name="total" id="total" class="form-control" placeholder="Total" disabled aria-describedby="helpId">
                </div>
            </div>
            
            <div class="col-md-12">
                <button type="button" class="btn btn-primary " data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="procesar(1)">Generar compra</button>
            </div>
        </div>
</div>

<?php include "Views/Tamplates/footer.php"; ?>