<!DOCTYPE html>
<html lang="en">
  <?php
    session_start();
    if(isset($_REQUEST['sesion'])&& $_REQUEST['sesion']=="cerrar"){
      session_destroy();
      header("location: login.php");
    }
    if(isset($_SESSION['id'])==false){
      header("location: login.php");
    }
    if($_SESSION['cargo'] != "Almacenero"){
      header("location: login.php");
    }
    $modulo = $_REQUEST['modulo']??'';
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Almacenero | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  
  <!-- DataTables -->

   <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">  -->

  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">  -->
  <link rel="stylesheet" href="css/editor.dataTables.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/icono_huevos.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> -->

        <!-- <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <div class="media-body">
                <h3 style="margin-left: 90px" class="dropdown-item-title">

                  <!-- Nombre del Usuario -->
                  
                  <?php echo $_SESSION['usuario']; ?>
                  <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                </h3>
                <!-- <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <span class="float-right text-sm text-muted" style="margin-left: 40px"><i class="fas fa-sign-out-alt"></i></span>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <a href="panel_almacenero.php?modulo=&sesion=cerrar" style="margin-left: 50px" >Cerrar Sesion</a>
                  <!-- <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span> -->
                </h3>
                <!-- <p class="text-sm">I got your message bro</p> -->
                <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          <!-- </a> -->
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item"> -->
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <span class="float-right text-sm text-warning" style="margin-left: 40px"><i class="fas fa-user-edit"></i></span>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <a href="panel_almacenero.php?modulo=editar_usuario&id=<?php echo $_SESSION['id'];?>" style="margin-left: 47px" >Editar Cuenta</a>
                  
                  <!-- <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span> -->
                </h3>
                <!-- <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          <!-- </a> -->
          <!-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a> -->
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->

      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/icono_huevos.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Almacenero | QualityEggs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/perfil_almacenero.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']." "; echo $_SESSION['apellido']; ?></a>
          <a href="#" class="d-block"><?php echo $_SESSION['email'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Gestionar Tienda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel_almacenero.php?modulo=dashboard" class="nav-link <?php echo ($modulo=="dashboard"|| $modulo=="")?"active":"";?>">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="panel_almacenero.php?modulo=productos" class="nav-link <?php echo ($modulo=="productos"|| $modulo=="")?"active":"";?> ">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <?php
    if(isset($_REQUEST['mensaje'])){
      ?>
      <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <?php echo $_REQUEST['mensaje']?>
      </div>
      <?php
    }

      if($modulo=="dashboard" || $modulo==""){
        include_once "dashboard.php";
      }
      
      if($modulo=="productos" ){
        include_once "productos.php";
      }
      
      
      if($modulo=="editar_usuario"){
        include_once "editar_usuario.php";
      }
      

      
    ?>

 

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->

<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>  -->



<!-- <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->

<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>

<!-- <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  -->




<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script> 
<!-- <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script> -->
<script src="js/dataTables.editor.min.js"></script>




<!-- Page specific script -->
<script>
  $(function () {
     $("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     
      $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
    });

    editor = new $.fn.dataTable.Editor( {
         ajax: "controllers/productos.php",
         table: "#tabla_productos",
         fields: [ {
                 label: "ID:",
                 name: "id"
             }, {
                 label: "NOMBRE:",
                 name: "nombre"
             }, {
                 label: "PRECIO:",
                 name: "precio"
             }, {
                 label: "STOCK:",
                 name: "stock"
              }, {
                 label: "Descripcion:",
                 name: "descripcion"
              }, 
            {
                label: "Imagenes:",
                name: "files[].id",
                type: "uploadMany",
                display: function ( fileId, counter ) {
                    return '<img src="'+editor.file( 'files', fileId ).web_path+'"/>';
                },
                noFileText: 'No hay imagenes'
            }
         ]
     } );
 
     $('#tabla_productos').DataTable( {
         dom: "Bfrtip",
         ajax: "controllers/productos.php",
         columns: [
             { data: "id" },
             { data: "nombre" },
             { data: "precio", render: $.fn.dataTable.render.number( ',', '.', 0, 'S/.' ) },
             { data: "stock" },
             { data: "descripcion" },
             {
                data: "files",
                render: function ( d ) {
                    return d.length ?
                        d.length+' imagen(es)' :
                        'No hay imagen(es)';
                },
                title: "Imagen"
            }
         ],
         select: true,
         buttons: [
             { extend: "create", editor: editor },
             { extend: "edit",   editor: editor },
             { extend: "remove", editor: editor }
         ]
     } );

  });

</script>
<script>
  $(document).ready(function(){
    $(".borrar").click(function (e){
      e.preventDefault();
      var res=confirm("¿Estas seguro de eliminar al usuario?");
      if(res==true){
        var link=$(this).attr("href");
        window.location=link;
      }
    });
  });
</script>
</body>
</html>
