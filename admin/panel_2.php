<!DOCTYPE html>
<html lang="en">
  <?php
    // session_start();
    // if(isset($_REQUEST['sesion'])&& $_REQUEST['sesion']=="cerrar"){
    //   session_destroy();
    //   header("location: login.php");
    // }
    // if(isset($_SESSION['id'])==false){
    //   header("location: login.php");
    // }
    //$modulo = $_REQUEST['modulo']??'';
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tienda</title>

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

  <link rel="stylesheet" href="css/stripe.css">
  
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet"
          href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
        /* Modify the background color */
         
        .navbar-custom {
            background-color: #dc6e45;
        }
        /* Modify brand and text color */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #f8f2eb;
        }
    </style>



  <?php
    session_start();
    $accion=$_REQUEST['accion']??'';
    if($accion=='cerrar'){
      session_destroy();
      header("Refresh:0");
    }
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<?php
  include_once "db_conexion.php";
  $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);
?>

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/icono_huevos.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  



      <?php
      include_once "menu.php";
      $modulo=$_REQUEST['modulo']??'';
      if($modulo=="productos_2"||$modulo==""){
        include_once "productos_2.php";
      }
      if($modulo=="detalle_producto"){
        include_once "detalle_producto.php";
      }
       if($modulo=="tienda" ){
        //  include_once "tienda.php";
        include_once "productos_2.php";
      }
       if($modulo=="lista_compras" ){
        include_once "lista_compras.php";
      }
       if($modulo=="cliente_perfil" ){
        include_once "cliente_perfil.php";
      }
      if($modulo=="carrito" ){
        include_once "carrito.php";
      }
      if($modulo=="envio" ){
        include_once "envio.php";
      }
      if($modulo=="pasarela" ){
        include_once "pasarela.php";
      }
      if($modulo=="factura" ){
        include_once "factura.php";
      }

      ?>

  <!-- /.navbar -->


</div>


  <!-- Main Sidebar Container -->

  <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="#" class="brand-link">
      <img src="dist/img/icono_huevos.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cliente | QualityEggs</span>
    </a>

   
    <div class="sidebar">
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nombre y apellido<?php //echo $_SESSION['nombre']." "; echo $_SESSION['apellido']; ?></a>
          <a href="#" class="d-block">email<?php //echo $_SESSION['email'];?></a>
        </div>
      </div>

     
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                 Tienda Online
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="panel_2.php?modulo=tienda" class="nav-link <?php //echo ($modulo=="tienda"|| $modulo=="")?"active":"";?>">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Tienda</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="panel_2.php?modulo=lista_compras" class="nav-link <?php //echo ($modulo=="lista_compras"|| $modulo=="")?"active":"";?> ">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Lista de compras</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="panel_2.php?modulo=cliente_perfil" class="nav-link <?php //echo ($modulo=="cliente_perfil"|| $modulo=="")?"active":"";?>">
                 
                  <i class="fas fa-users nav-icon"></i>
                  <p>Perfil del cliente</p>
                </a>
              </li>

        </ul>
      </nav>
    </div>
  </aside> -->

    <?php
   
      // if($modulo=="tienda" || $modulo==""){
      //   include_once "tienda.php";
      // }
      // if($modulo=="lista_compras" || $modulo==""){
      //   include_once "lista_compras.php";
      // }
      // if($modulo=="cliente_perfil" || $modulo==""){
      //   include_once "cliente_perfil.php";
      // }
    //   if($modulo=="ventas" || $modulo==""){
    //     include_once "ventas.php";
    //   }
    //   if($modulo=="crear_usuario" || $modulo==""){
    //     include_once "crear_usuario.php";
    //   }
    //   if($modulo=="editar_usuario"){
    //     include_once "editar_usuario.php";
    //   }
      // if($modulo=="productos"){
      //   include_once "productos.php";
      // }

      
    ?>

  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
  



</div>
<!-- ./wrapper -->


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
  })

</script>



<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

<script src="https://js.stripe.com/v3/"></script>
<script src="js/stripe.js"></script>
<script src="js/ecommerce.js"></script>



</body>
</html>
