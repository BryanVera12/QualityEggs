<?php
    $id=mysqli_real_escape_string($conexion,$_REQUEST['id']??'');
    $queryProducto="SELECT id, nombre, precio, stock,descripcion FROM productos WHERE id='$id';";
    $resProducto=mysqli_query($conexion,$queryProducto);
    $rowProducto=mysqli_fetch_assoc($resProducto);

?>

<div class="content-wrapper">
<!-- Default box -->
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre'] ?></h3>
              <?php
                $queryImagenes="SELECT
                f.web_path
                FROM
                productos AS p
                INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                INNER JOIN files AS f ON f.id=pf.file_id
                WHERE p.id = '$id';";

                $resPrimerImagen=mysqli_query($conexion, $queryImagenes);
                $rowPrimerImagen=mysqli_fetch_assoc($resPrimerImagen);
                ?>

                <div class="col-12">
                    <img src="<?php echo $rowPrimerImagen['web_path'] ?>" class="product-image" >
                </div>
                <div class="col-12 product-image-thumbs">
                <?php
                $resImagenes=mysqli_query($conexion, $queryImagenes);
                while($rowImagenes=mysqli_fetch_assoc($resImagenes)){  
                ?>
              
                    <div class="product-image-thumb"><img src="<?php echo $rowImagenes['web_path']?>" ></div>
                
              
                <?php
                }
                ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo strtoupper($rowProducto['nombre']) ?></h3>
              <p><?php echo $rowProducto['descripcion'] ?></p>

              <hr>
              <h4>Stock: <?php echo $rowProducto['stock'] ?> (paquetes) </h4>
              <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div> -->

              <h4 class="mt-3">Precio: </h4>
              <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div> -->

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  S/<?php echo $rowProducto['precio'] ?>
                </h2>
                <h4 class="mt-0">
                  <small>(El paquete)</small>
                </h4>
              </div>

              <div class="mt-4">
                <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito" data-id="<?php echo $_REQUEST['id'] ?>" data-nombre="<?php echo $rowProducto['nombre'] ?>" data-web_path="<?php echo $rowPrimerImagen['web_path']?>" data-precio="<?php echo $rowProducto['precio'] ?>">
                
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Añadir a carrito
                </button>
              </div>

              <div class="mt-4">
                Cantidad 
                <input type="number" min="1" max="<?php echo $rowProducto['stock'] ; ?>" class="form-control" id="cantidadProducto" value="1">
              </div>

              

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              
            </nav>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</div>

