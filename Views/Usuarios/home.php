<?php include "Views/Tamplates/header.php"; ?>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary">
            <div class="card-body d-flex text-white">
                Usuarios
                <i class="fas fa-user fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-primary">
                <a href="<?php echo base_url; ?>Usuarios" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['usuarios']['total'];?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning">
            <div class="card-body d-flex text-white">
                Clientes
                <i class="fas fa-users fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-warning">
                <a href="<?php echo base_url; ?>Clientes" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['clientes']['total'];?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success">
            <div class="card-body d-flex text-white">
                Productos
                <i class="fab fa-product-hunt fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-success">
                <a href="<?php echo base_url; ?>Productos" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['productos']['total'];?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger">
            <div class="card-body d-flex text-white">
                Ventas por dia
                <i class="fas fa-cash-register fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-danger">
                <a href="<?php echo base_url; ?>Compras/historial_ventas" class="text-white">Ver detalle</a>
                <span class="text-white"><?php echo $data['ventas']['total'];?></span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-light text-black">
                Productos mas fabricados
            </div>
            <div class="card-body">
                <canvas id="stockMinimo" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-light text-black">
                Productos mas vendidos
            </div>
            <div class="card-body">
            <canvas id="productosVendidos" width="400" height="400"></canvas>

            </div>
        </div>
    </div>
</div>

<div class="col-xl-12">
        <div class="card mt-4">
            <div class="card-header bg-light text-black">
                Lista de productos
            <div class="card-body">
            
            <img src="./Assets/img/lista.jpg" alt="" style="width: 14%;">
            </div>
        </div>

          
    </div>
<?php include "Views/Tamplates/footer.php"; ?>