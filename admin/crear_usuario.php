<?php
    if(isset($_REQUEST['guardar'])){
        include_once "db_conexion.php";
        $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);    

        $nombre=mysqli_real_escape_string($conexion, $_REQUEST['nombre']??'');
        $apellido=mysqli_real_escape_string($conexion, $_REQUEST['apellido']??'');
        $email=mysqli_real_escape_string($conexion, $_REQUEST['email']??'');
        $usuario=mysqli_real_escape_string($conexion, $_REQUEST['usuario']??'');
        $passw=md5(mysqli_real_escape_string($conexion, $_REQUEST['contrasena']??''));
        $cargo=mysqli_real_escape_string($conexion, $_REQUEST['cargo']??'');

        $query="INSERT INTO usuarios 
        (nombre,apellido,email,usuario,password,cargo) VALUES ('".$nombre."','".$apellido."','".$email."','".$usuario."','".$passw."','".$cargo."')";

        $result = mysqli_query($conexion,$query);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente"/>';
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al crear usuario <?php echo mysqli_error($conexion); ?>
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
            <h1>Crear Trabajador</h1>
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
      <!-- <div class="container-fluid"> -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              

            <!-- <div class="card"> -->
              <!-- <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
               <form action="panel.php?modulo=crear_usuario" method="post">
                    <div class="form-group"> 
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" required="required">
                    </div>
                    <div class="form-group"> 
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" required="required">
                   </div>
                    <div class="form-group"> 
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="required">
                    </div>
                    <div class="form-group"> 
                        <label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" required="required">
                    </div>
                    <div class="form-group"> 
                        <label >Seleccione Cargo</label>
                        <Select  name = "cargo">
                        <Option  value = "Almacenero"> Almacenero
                        <Option  value = "Vendedor"> Vendedor
                        </Select></P>
                    </div>
                    <div class="form-group"> 
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" required="required">
                   </div>
                   <div class="form-group"> 
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                   </div>
               </form>
              </div>
              <!-- /.card-body -->

           </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <!-- </div> -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->