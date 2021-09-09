<?php
 include_once "db_conexion.php";
 $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla_productos" class="table table-bordered table-striped">
                <!-- <table id="tabla_productos" class="table table-bordered table-striped"> -->
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>STOCK</th>
                    <th>DESCRIPCIÓN</th>
                    <th>Imagen(es)</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php

                        include_once "db_conexion.php";
                          $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);



                        $query="SELECT id,nombre,precio,stock,descripcion FROM productos;";
                        $result = mysqli_query($conexion,$query);

                        while($row=mysqli_fetch_assoc($result)){
                          ?>
                              <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['precio'] ?></td>
                                <td><?php echo $row['stock'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                

                              </tr>
                        <?php
                        }
                        ?>
                             
                    </tbody>





                  <!-- <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Nombre</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>USUARIO</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->