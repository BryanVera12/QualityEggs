<?php
 include_once "db_conexion.php";
 $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);
if(isset($_REQUEST['idBorrar'])){
    $id=mysqli_real_escape_string($conexion,$_REQUEST['idBorrar']??'');
    $query="DELETE FROM usuarios WHERE id='".$id."'";
    $result=mysqli_query($conexion,$query);
    if($result){
        ?>
        <div class="alert alert-warning float-right" role="alert">
            Usuario Borrado con exito
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger float-right" role="alert">
            Error al borrar <?php echo mysqli_error($conexion);?>
        </div>
        <?php
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div> -->
              <!-- /.card-header -->

              <!-- <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                 
       
                  <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                  </tr>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div> -->

              <!-- /.card-body -->

            <!-- </div> -->
            <!-- /.card -->

            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>USUARIO</th>
                    <th>Cargo</th>
                    <th>ACCIONES
                        <a href="panel.php?modulo=crear_usuario"><i class="fa fa-plus" aria-hidden="true" style="margin-left:10px"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                       include_once "db_conexion.php";
                       $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);



                       $query="SELECT id,nombre,apellido,email,usuario,cargo FROM usuarios ";
                       $result = mysqli_query($conexion,$query);

                       while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                              <td><?php echo $row['id'] ?></td>
                              <td><?php echo $row['nombre'] ?></td>
                              <td><?php echo $row['apellido'] ?></td>
                              <td><?php echo $row['email'] ?></td>
                              <td><?php echo $row['usuario'] ?></td>
                              <td><?php echo $row['cargo'] ?></td>
                              <td>
                                  <a href="panel.php?modulo=editar_usuario&id=<?php echo $row['id'] ?>" style="margin-left: 60px;"><i class="fas fa-edit"></i></a>
                                  <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $row['id'] ?>" class="text-danger borrar" style="margin-left:80px"><i class="fas fa-trash"></i></a>
                              </td>
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