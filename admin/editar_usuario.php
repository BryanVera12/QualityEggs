<?php
    include_once "db_conexion.php";
    $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);  
    if(isset($_REQUEST['guardar'])){

        $nombre=mysqli_real_escape_string($conexion, $_REQUEST['nombre']??'');
        $apellido=mysqli_real_escape_string($conexion, $_REQUEST['apellido']??'');
        $email=mysqli_real_escape_string($conexion, $_REQUEST['email']??'');
        $usuario=mysqli_real_escape_string($conexion, $_REQUEST['usuario']??'');
        $passw=md5(mysqli_real_escape_string($conexion, $_REQUEST['contrasena']??''));
        $id=mysqli_real_escape_string($conexion, $_REQUEST['id']??'');

        $query="UPDATE usuarios SET
        nombre='".$nombre."', apellido='".$apellido."', email='".$email."', usuario='".$usuario."', password='".$passw."' 
        WHERE id='".$id."';";

        $result = mysqli_query($conexion,$query);

        if($result){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$usuario.' editado exitosamente"/>';
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al crear usuario <?php echo mysqli_error($conexion); ?>
            </div>
            <?php
        }
    }
    $id=mysqli_real_escape_string($conexion, $_REQUEST['id']??'');
    $query="SELECT id,nombre,apellido,email,usuario,password FROM usuarios WHERE id='".$id."';";
    $result=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuario</h1>
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
               <form action="panel.php?modulo=editar_usuario" method="post">
                    <div class="form-group"> 
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="required">
                    </div>
                    <div class="form-group"> 
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido'] ?>" required="required">
                   </div>
                    <div class="form-group"> 
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required="required">
                    </div>
                    <div class="form-group"> 
                        <label>Nombre de Usuario</label>
                        <input type="text" name="usuario" class="form-control" value="<?php echo $row['usuario'] ?>" required="required">
                    </div>
                    <div class="form-group"> 
                        <label>Contrasena</label>
                        <input type="password" name="contrasena" class="form-control" required="required">
                   </div>
                   <div class="form-group"> 
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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