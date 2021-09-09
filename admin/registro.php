<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro | QualityEggs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Regístrate</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa los datos para registrarte</p>


      <?php 
        if (isset($_REQUEST['registro'])){
          session_start();
          $nombre=$_REQUEST['nombre']??'';
          $apellido=$_REQUEST['apellido']??'';
          $email=$_REQUEST['email']??'';
          $usuario=$_REQUEST['usuario']??''; 
          $contr=$_REQUEST['contrasena']??'';
          $passw=md5($contr);
          $direccion=$_REQUEST['direccion']??'';
          $telefono=$_REQUEST['telefono']??'';

          include_once "db_conexion.php";
          $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);
          $query="INSERT INTO clientes (nombre,apellido,email,usuario,password,direccion,telefono) VALUES ('$nombre','$apellido','$email','$usuario','$passw','$direccion','$telefono')";

          $result = mysqli_query($conexion,$query);
          if($result){
            ?>
                <div class="alert alert-primary" role="alert">
                    <strong>Registro exitoso</strong> <a href="login_cliente.php">Ir a login</a>
                </div>
            <?php
          }else{
            ?>
            <div class="alert alert-danger" role="alert">
              Error de registro
            </div>
            <?php

          }
        }
      ?>


      <form method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-pen"></span>
                    </div>
                </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Apellido" name="apellido">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-pen"></span>
                    </div>
                </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
        </div>

        <div class="input-group mb-3">
          <!-- <input type="email" class="form-control" placeholder="Email" name="email"> -->
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-home"></span>
                    </div>
                </div>
        </div>

        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Telefono" name="telefono">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-signal"></span>
                    </div>
                </div>
        </div>

        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="registro">Registrar</button>
            <button type="submit" class="btn btn-secunday btn-block" name=""><a href="../index.php">Volver</a></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <!-- <a href="forgot-password.html">I forgot my password</a> -->
        ¿Ya tienes una cuenta?
      </p>
      <p class="mb-0">
        <a href="login_cliente.php" class="text-center">Ir a login</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
