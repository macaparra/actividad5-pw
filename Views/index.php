<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./Assets/img/canva.png" type="image/x-icon"/>

    <title>LimpiezaStock - Iniciar sesion</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url;?>Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url;?>Assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
      body {
        background-image: url("https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco,c_fill,g_auto,w_1500,ar_3:2/k%2FDesign%2F2021-04%2Ftiktokcleaningkit-lead");
        height: 500px; /* You must set a specified height */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */
      }
    </style>

</head>

<body >

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                         <img src="./Assets/img/canva.png" alt="" style="width: 14%;">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido al sistema!</h1>
                                    </div>
                                    <form id="frmLogin" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="usuario" name="usuario" aria-describedby="emailHelp"
                                                placeholder="Ingrese Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="clave" name="clave" placeholder="Ingrese Contrasena">
                                        </div>
                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="button" style="width:100%" aria-pressed="false" autocomplete="off" onclick="frmLogin(event);">Ingresar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url;?>Assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url;?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url;?>Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url;?>Assets/js/sb-admin-2.min.js"></script>
    <script>
        const base_url = "<?php echo base_url;?>";
    </script>
    <script src="<?php echo base_url;?>Assets/js/login.js"></script>


</body>

</html>