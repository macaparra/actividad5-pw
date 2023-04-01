
let tblUsuarios, tblClientes, tblProductos;

document.addEventListener("DOMContentLoaded", function(){
    $('#cliente').select2();
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id'},
            {
            'data' : "usuario"
            },
            {
            'data' : 'nombre'
            },
            {
            'data' : 'caja'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    // Fin de la tabla usuarios

    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id'
            },
            {
            'data' : "dni"
            },
            {
            'data' : 'nombre'
            },
            {
            'data' : 'telefono'
            },
            {
            'data' : 'direccion'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de clientes',
                    filename: 'Reporte de clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de clientes',
                    filename: 'Reporte de clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    // Fin de la tabla clientes

    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id'},
            {
            'data' : "imagen"
            },
            {
            'data' : 'codigo'
            },
            {
            'data' : 'descripcion'
            },
            {
            'data' : 'precio_venta'
            },
            {
            'data' : 'cantidad'
            },
            {
            'data' : 'estado'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de productos',
                    filename: 'Reporte de productos',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de productos',
                    filename: 'Reporte de productos',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    // Fin de la tabla productos

    $('#t_historial_c').DataTable({
        ajax: {
            url: base_url + "Compras/listar_historial",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id'},
            {
            'data' : "total"
            },
            {
            'data' : 'fecha'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de historial de compras',
                    filename: 'Reporte historial de compras',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de historial de compras',
                    filename: 'Reporte de historial de compras',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });

    $('#t_historial_v').DataTable({
        ajax: {
            url: base_url + "Compras/listar_historial_venta",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id'},
            {
            'data' : "nombre"
            },
            {
            'data' : "total"
            },
            {
            'data' : 'fecha'
            },
            {
            'data' : 'acciones'
            }
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de historial de compras',
                    filename: 'Reporte historial de compras',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de historial de compras',
                    filename: 'Reporte de historial de compras',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });


    
})

function frmCambiarPass(e) {
   e.preventDefault();
   const actual = document.getElementById('clave_actual').value;
   const nueva = document.getElementById('clave_nueva').value;
   const confirmar = document.getElementById('confirmar_clave').value;
   if (actual == '' || nueva == '' || confirmar == '') {
    alertas('Debes llenar todos los campos', 'warning');
   }else{
    if (nueva != confirmar) {
        alertas('Las contrasenas no coinciden', 'warning');
    }else{
        const url = base_url + "Usuarios/cambiarPass";
        const frm = document.getElementById("frmCambiarPass");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            $("#cambiarPass").modal("hide");
            frm.reset();

            
        }
    }
    }
   }

}

function frmUsuario(){
    document.getElementById("title").innerHTML = "Registrar Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}

function registrarUser(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const caja = document.getElementById("caja");
    if (usuario.value == "" || nombre.value == ""|| caja.value == "") {
       alertas('Debes llenar todos los campos', 'warning');
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo_usuario").modal("hide");
                alertas(res.msg, res.icono);
                tblUsuarios.ajax.reload();
            }
        }

    }
}

function btnEditarCli(id){
    document.getElementById("title").innerHTML = "Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Clientes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("dni").value = res.dni;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            $("#nuevo_cliente").modal("show");
        }
    }
}

function btnEliminarUser(id)
{
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiara su estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblUsuarios.ajax.reload();
                    
                }
            }
        }
      })
}

function btnReingresarUser(id)
{
    Swal.fire({
        title: 'Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                   
                }
            }
        }
      })
}

//Fin Usuarios

function frmCliente(){
    document.getElementById("title").innerHTML = "Registrar Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value = "";
}

function registrarCli(e){
    e.preventDefault();
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    if (dni.value == "" || nombre.value == ""|| telefono.value == "" || direccion.value == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Debes llenar todos los campos',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cliente registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cliente modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }

    }
}

function btnEditarUser(id){
    document.getElementById("title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Usuarios/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("usuario").value = res.usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("caja").value = res.id_caja;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevo_usuario").modal("show");
        }
    }
}

function btnEliminarCli(id)
{
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiara su estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje:',
                            'Cliente eliminado con exito',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje:',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
      })
}

function btnReingresarCli(id)
{
    Swal.fire({
        title: 'Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje:',
                            'Cliente reingresado con exito',
                            'success'
                        )
                        tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje:',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
      })
}

//Fin Clientes


function frmProducto(){
    document.getElementById("title").innerHTML = "Registrar Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    $("#nuevo_producto").modal("show");
    document.getElementById("id").value = "";
    deleteImg();
}

function registrarPro(e){
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const nombre = document.getElementById("nombre");
    const precio_compra = document.getElementById("precio_compra");
    const precio_venta = document.getElementById("precio_venta");
    if (codigo.value == "" || nombre.value == ""|| precio_compra.value == "" || precio_venta.value == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Debes llenar todos los campos',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                console.log('this.responseText: ', this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Producto registrado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Producto modificado con exito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_producto").modal("hide");
                   tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            }
        }

    }
}

function btnEditarPro(id){
    document.getElementById("title").innerHTML = "Actualizar Producto";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    const url = base_url + "Productos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("nombre").value = res.descripcion;
            document.getElementById("precio_compra").value = res.precio_compra;
            document.getElementById("precio_venta").value = res.precio_venta;
            document.getElementById("img-preview").src = base_url + 'Assets/img/' + res.foto;
            document.getElementById("icon-cerrar").innerHTML = `
            <button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>`;
            document.getElementById("icon-image").classList.add("d-none");
            document.getElementById("foto_actual").value = res.foto;
            $("#nuevo_producto").modal("show");
        }
    }
}

function btnEliminarPro(id)
{
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "El producto no se eliminara de forma permanente, solo cambiara su estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje:',
                            'Producto eliminado con exito',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje:',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
      })
}

function btnReingresarPro(id)
{
    Swal.fire({
        title: 'Estas seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Mensaje:',
                            'Producto reingresado con exito',
                            'success'
                        )
                        tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje:',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
      })
}

function preview(e){
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
    <button class="btn btn-danger" onclick="deleteImg()"><i class="fas fa-times"></i></button>
    ${url['name']}`;
}

function deleteImg(){
    document.getElementById("icon-cerrar").innerHTML ='';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById("imagen").value = '';
    document.getElementById("foto_actual").value = '';
}

function buscarCodigo(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if (e.which == 13) {
            const url = base_url + "Compras/buscarCodigo/"+cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value = res.descripcion;
                        document.getElementById("precio").value = res.precio_compra;
                        document.getElementById("id").value = res.id;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();
                    } else {
                       alertas('El producto no existe', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("precio").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese el codigo', 'warning');
    }
    
}

function buscarCodigoVenta(e){
    e.preventDefault();
    if (e.which == 13) {
        const cod = document.getElementById("codigo").value;
        const url = base_url + "Compras/buscarCodigo/"+cod;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res) {
                    document.getElementById("nombre").value = res.descripcion;
                    document.getElementById("precio").value = res.precio_venta;
                    document.getElementById("id").value = res.id;
                    document.getElementById("cantidad").focus();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'El producto no existe',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    document.getElementById("codigo").value = '';
                    document.getElementById("precio").value = '';
                    document.getElementById("codigo").focus();
                }
            }
        }
    }
    
}

function calcularPrecio(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if (cant > 0) {
            const url = base_url + "Compras/ingresar";
            const frm = document.getElementById("frmCompra");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargarDetalle();
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    document.getElementById('codigo').focus();
                    
                }
            }
        }
    }   
}

if (document.getElementById('tblDetalle')) {
    cargarDetalle();
}

if (document.getElementById('tblDetalleVenta')) {
    cargarDetalleVenta();
}

function calcularPrecioVenta(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if (cant > 0) {
            const url = base_url + "Compras/ingresarVenta";
            const frm = document.getElementById("frmVenta");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == 'ok') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Producto ingresado',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        frm.reset();
                        cargarDetalleVenta();
                    }else if (res == 'modificado') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Producto actualizado',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        frm.reset();
                        cargarDetalle();
                    }
                }
            }
        }
    }   
}

function cargarDetalle(){
    const url = base_url + "Compras/listar/detalle";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
        http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
        const res = JSON.parse(this.responseText);
        let html = '';
        res.detalle.forEach(row => {
            html += `<tr>
            <td>${row['id']}</td>
            <td>${row['descripcion']}</td>
            <td>${row['cantidad']}</td>
            <td>${row['precio']}</td>
            <td>${row['sub_total']}</td>
            <td>
            <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 1)"><i class="fas fa-trash-alt"></i></button>
            </td>
            </tr>`;
        });
        document.getElementById('tblDetalle').innerHTML = html;
        document.getElementById("total").value = res.total_pagar.total;
        }  
    }
}

function cargarDetalleVenta(){
    const url = base_url + "Compras/listar/detalle_temp";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
        http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
        const res = JSON.parse(this.responseText);
        let html = '';
        res.detalle.forEach(row => {
            html += `<tr>
            <td>${row['id']}</td>
            <td>${row['descripcion']}</td>
            <td>${row['cantidad']}</td>
            <td>${row['precio']}</td>
            <td>${row['sub_total']}</td>
            <td>
            <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 2)"><i class="fas fa-trash-alt"></i></button>
            </td>
            </tr>`;
        });
        document.getElementById('tblDetalleVenta').innerHTML = html;
        document.getElementById("total").value = res.total_pagar.total;
        }  
    }
}

function deleteDetalle(id, accion){
    let url;
    if (accion == 1) {
         url = base_url + "Compras/delete/"+id;
    }else{
         url = base_url + "Compras/deleteVenta/"+id;
    }
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            if (accion == 1) {
                cargarDetalle();
            }else{
                cargarDetalleVenta();
            }
            
           
        }
    }
}

function procesar(accion){
    Swal.fire({
        title: 'Estas seguro de realizar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            let url;
            if(accion == 1){
                url = base_url + "Compras/registrarCompra";
            }else{
                const id_cliente = document.getElementById('cliente').value;
                url = base_url + "Compras/registrarVenta/"+ id_cliente;
            }
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                            'Mensaje:',
                            'Compra generada',
                            'success'
                        )
                        let ruta;
                        if (accion == 1) {
                            ruta = base_url + 'Compras/generarPdf/'+ res.id_compra;
                        }else{
                            ruta = base_url + 'Compras/generarPdfVenta/'+ res.id_venta;
                        }
                        window.open(ruta);
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                    }else{
                        Swal.fire(
                            'Mensaje:',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
      }) 
}

function alertas(mensaje, icono){
    Swal.fire({
        position: 'center',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 2000
    })
}

reporteStock();
productosVendidos();
function reporteStock(){
    const url = base_url + "Usuarios/reporteStock";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
        http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['cantidad']);

                
            }
            var ctx = document.getElementById("stockMinimo");
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: nombre,
                datasets: [{
                data: cantidad,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                },
                legend: {
                display: false
                },
                cutoutPercentage: 80,
            },
            });
            }   }
}

function productosVendidos(){
    const url = base_url + "Usuarios/productosVendidos";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
        http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['total']);

                
            }
            var ctx = document.getElementById("productosVendidos");
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: nombre,
                datasets: [{
                data: cantidad,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                },
                legend: {
                display: false
                },
                cutoutPercentage: 80,
            },
            });
            }   }
}



    

   