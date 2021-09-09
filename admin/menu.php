<!-- Navbar -->
<!-- <nav class=" navbar navbar-expand navbar-yellow "> -->
<nav class=" navbar navbar-expand navbar-custom ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <ul class="navbar-nav">
    <div class="logo">
                            
      <img src="dist/img/Logo.jpg" alt="img" />
      </div> 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link" style="color: white">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="panel_2.php" class="nav-link" style="color: white">Productos</a>
      </li>

    </ul>



          <form class="form-inline ml-3" action="panel_2.php">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre']??'';?>">
              <input type="hidden" name="modulo" value="productos_2">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search" style="color: white"></i>
                </button>
              </div>
            </div>
          </form>

 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
      </li> -->



 <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito" style="color: white">
          <i class="fas fa-cart-plus"></i>
          <span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">

      </li>




      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="color: white">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>

        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <?php
                if(!isset($_SESSION['idCliente']) && !isset($_SESSION['id'])){
                
            ?>

          <!-- <a href="#" class="dropdown-item">
            
            <div class="media">
              <div class="media-body">
                <h3 style="margin-left: 90px" class="dropdown-item-title">

                   Nombre de Usuario 
                  
                  <?php //echo $_SESSION['usuario']; ?> 

                
                </h3>
             
              </div>
            </div>
            
            </a> -->
            <!-- <div class="dropdown-divider"></div> -->
         
            <!-- Message Start -->
            <div class="media">
              
              <span class="float-right text-sm text-muted" style="margin-left: 15px"><i class="fas fa-sign-out-alt"></i></span>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <a href="login_cliente.php" style="margin-left: 18px" >Login</a>
                  
                </h3>
                
              </div>
            </div>
            <!-- Message End -->
       
          <div class="dropdown-divider"></div>
            <div class="media">
              
              <span class="float-right text-sm text-warning" style="margin-left: 15px"><i class="fas fa-user-edit"></i></span>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <a href="registro.php" style="margin-left: 15px" >Registrarse</a>
                  
                 
                </h3>
               
              </div>
            </div>
            <?php
                }else{ 

                    ?>
                <div class="media">
                    <span class="float-right text-sm text-warning" style="margin-left: 15px"><i class="fas fa-user"></i></span>
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        <a href="panel_2.php?modulo=usuario" style="margin-left: 15px" ><?php if(isset($_SESSION['nombreCliente'])){echo $_SESSION['nombreCliente'];}else{echo $_SESSION['nombre']; }?></a>
                        </h3>
               
                    </div>
                </div>
                <form action="panel_2.php" method="post">
                    
                
                <div class="media">
                    <!-- <span class="float-right text-sm text-warning" style="margin-left: 15px"><i class="fas fa-door-closed"></i></span> -->
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        <button name="accion" class="btn btn-danger dropdown-item" type="submit" value="cerrar">
                        <i class="fas fa-door-closed text-danger mr-2"></i>Cerrar sesion
                        </button>
                        </h3>
               
                    </div>
                </div>
                </form>
                    <?php
                }
            ?>
        </div>
      </li>

      
    </ul>
  </nav>
  <?php
    $mensaje=$_REQUEST['mensaje']??'';
    if($mensaje){
  ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?php echo $mensaje; ?>
    </div>
  <?php
  }
  ?>