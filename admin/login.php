<?php
    session_start();
    if(isset($_SESSION['cargo'])&& $_SESSION['cargo'] =="Administrador" ){
      echo '
      <script>
          window.location = "panel.php";
      </script>
      ';
    }else {

      if(isset($_SESSION['cargo'])&& $_SESSION['cargo'] == "Almacenero" ){
        echo '
        <script>
            window.location = "panel_almacenero.php";
        </script>
        ';
      }else{
        if(isset($_SESSION['cargo'])&& $_SESSION['cargo'] == "Vendedor" ){
          echo '
          <script>
              window.location = "panel_vendedor.php";
          </script>
          ';
        }
      }
    }
   
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ingreso de sesion | QualityEggs</title>

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
      <a href="../../index2.html" class="h1"><b>Inicio de sesion</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa los datos para iniciar sesion</p>


      <?php 
        if (isset($_REQUEST['login'])){
          
          $usuario=$_REQUEST['usuario']??''; 
          $contr=$_REQUEST['contrasena']??'';
          $passw=md5($contr);
          include_once "db_conexion.php";
          $conexion=mysqli_connect($host,$user,$pass,$db,$port,$socket);
          $query="SELECT id,nombre,apellido,email,usuario,cargo FROM usuarios WHERE usuario='".$usuario."' AND password='".$passw."';";

          $result = mysqli_query($conexion,$query);
          $row=mysqli_fetch_assoc($result);
          if($row){
            $_SESSION['id']=$row['id'];
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['apellido']=$row['apellido'];
            $_SESSION['email']=$row['email'];
            $_SESSION['usuario']=$row['usuario'];
            $_SESSION['cargo']=$row['cargo'];

            if($_SESSION['cargo']=="Administrador"){
              header("location: panel.php");
            }else{
              if($_SESSION['cargo']=="Almacenero"){
              header("location: panel_almacenero.php");
            }else{
              if($_SESSION['cargo']=="Vendedor"){
              header("location: panel_vendedor.php");
            }
            }
            }
            
            
          }else{
            ?>
            <div class="alert alert-danger" role="alert">
              Error de login
            </div>
            <?php

          }
        }
      ?>


      <form method="post">
        <div class="input-group mb-3">
          <!-- <input type="email" class="form-control" placeholder="Email" name="email"> -->
          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
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

     
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Registrate una nueva cuenta</a> -->
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
