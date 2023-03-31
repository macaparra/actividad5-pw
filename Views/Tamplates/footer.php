</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Actividad 5 - Programacion Web</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="cambiarPass" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-light">
                            <h5 class="modal-title" id="modalTitleId">Modificar Contraseña</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <form id="frmCambiarPass" onsubmit="frmCambiarPass(event)">
                        <div class="form-group">
                          <label for="clave_actual">Contraseña Actual</label>
                          <input type="password" class="form-control" name="clave_actual" id="clave_actual" aria-describedby="helpId" placeholder="Contraseña actual">
                        </div>
                        <div class="form-group">
                          <label for="clave_nueva">Contraseña Nueva</label>
                          <input type="password" class="form-control" name="clave_nueva" id="clave_nueva" aria-describedby="helpId" placeholder="Nueva contraseña">
                        </div>
                        <div class="form-group">
                          <label for="confirmar_clave">Confirmar Contraseña</label>
                          <input type="password" class="form-control" name="confirmar_clave" id="confirmar_clave" aria-describedby="helpId" placeholder="Confirmar contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off">Modificar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var modalId = document.getElementById('modalId');
    
        modalId.addEventListener('show.bs.modal', function (event) {
              // Button that triggered the modal
              let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
              let recipient = button.getAttribute('data-bs-whatever');
    
            // Use above variables to manipulate the DOM
        });
    </script>
    

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url;?>Assets/vendor/jquery/jquery-3.6.4.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" "></script>
 
    
    <script src="<?php echo base_url;?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url;?>Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url;?>Assets/js/sb-admin-2.min.js"></script>

    

    <script src="<?php echo base_url;?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url;?>Assets/DataTables/datatables.min.js"></script>
    <script src="<?php echo base_url;?>Assets/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
    " rel="stylesheet">

    <script src="<?php echo base_url;?>Assets/vendor/chart.js/Chart.min.js"></script>


    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>

    <script src="<?php echo base_url;?>Assets/js/funciones.js"></script>
</body>

</html>