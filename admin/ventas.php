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
            <h1>Resumen Ventas</h1>
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
                <table id="tabla_ventas" class="table table-bordered table-striped">
                <!-- <table id="tabla_productos" class="table table-bordered table-striped"> -->
                  <thead>
                  <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Monto Compra</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                    <?php

                        include_once "db_conexion.php";
                        $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);



                        $query="SELECT id,id_cliente,fecha FROM ventas;";
                        $result = mysqli_query($conexion,$query);
                        $TotalVenta = 0;
                        while($row=mysqli_fetch_assoc($result)){
                          $query2="SELECT nombre,apellido,email FROM clientes WHERE id='".$row['id_cliente']."';";
                          $result2 = mysqli_query($conexion,$query2);

                          $row2=mysqli_fetch_assoc($result2);

                                $NomCliente=$row2['email'];
                          
                          $query3="SELECT subtotal FROM detalleventas WHERE id_venta='".$row['id']."';";
                          $result3 = mysqli_query($conexion,$query3);
                          $Total=0;
                          while($row3=mysqli_fetch_assoc($result3)){

                              $Subtotal=$row3['subtotal'];
                              $Total=$Subtotal+$Total;
                          }
                          $TotalVenta=$Total + $TotalVenta;
                          ?>
                              <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $NomCliente ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td><?php echo 'S/.'.$Total ?></td>
                                <!-- <td><?php //echo $row['stock'] ?></td>
                                <td><?php //echo $row['descripcion'] ?></td> -->
                                

                              </tr>
                        <?php
                        }
                        ?>
                               <tr>
                                  <td colspan="3" class="text-right"  style="text-align: right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Ventas</b></td>
                                  <!-- <td><?php //echo "S/.".money_format("%i",$total); ?></td> -->
                                  <td><?php echo "S/.".$TotalVenta; ?></td>
                              </tr>
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