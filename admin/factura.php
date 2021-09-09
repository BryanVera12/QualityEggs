<?php
/*
    $total=$_REQUEST['total']??'';
    include_once "stripe/init.php";
    \Stripe\Stripe::setApiKey("sk_test_51JWxDoL7MVVlH7n7xVSZOScP6cuzbQOwuGzNK71uJbao3Cd2oVyQGbAzFNOguNGbNgrrudBsallQdX9C3udLlyQu00W0RhG3D1");
    $toke=$_POST['stripeToken'];
    $charge=\Stripe\Charge::create([
        'amount'=>$total,
        'currency'=>'usd',
        'description'=>'Pago de la compra',
        'source'=>$toke
    ]);
    if($charge['captured']){
        $queryVenta="INSERT INTO ventas 
        (id_cliente, id_pago, fecha) values
        ('".$_SESSION['idCliente']."','".$charge['id']."',now());
        ";
        $resVenta=mysqli_query($conexion,$queryVenta);
        $id=mysqli_insert_id($conexion);
        
       

//---------------------------------------------------------------------
        $insertaDetalle="";
        $cantProd=count($_REQUEST['id']);
        for($i=0;$i<$cantProd;$i++){
            $subTotal=$_REQUEST['precio'][$i]*$_REQUEST['cantidad'][$i];
            $insertaDetalle=$insertaDetalle."('".$_REQUEST['id'][$i]."','$id','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['precio'][$i]."','$subTotal'),";
        }
        $insertaDetalle=rtrim($insertaDetalle,",");
        $queryDetalle="INSERT INTO detalle_ventas 
        (id_producto, id_venta, cantidad, precio, subtotal) VALUES 
        $insertaDetalle;";
        echo $queryDetalle;
    }
    
    */

    


    $total=$_REQUEST['total']??'';
    include_once "stripe/init.php";
    \Stripe\Stripe::setApiKey("sk_test_51JWxDoL7MVVlH7n7xVSZOScP6cuzbQOwuGzNK71uJbao3Cd2oVyQGbAzFNOguNGbNgrrudBsallQdX9C3udLlyQu00W0RhG3D1");
    $toke=$_POST['stripeToken'];
    $charge=\Stripe\Charge::create([
        'amount'=>$total,
        'currency'=>'usd',
        'description'=>'Pago de la compra',
        'source'=>$toke
    ]);
    if($charge['captured']){
        $queryVenta="INSERT INTO ventas 
        (id_cliente,id_pago ,fecha) values
        ('".$_SESSION['idCliente']."','".$charge['id']."',now());
        ";
        $resVenta=mysqli_query($conexion,$queryVenta);
        $id=mysqli_insert_id($conexion);
        /*
        if($resVenta){
            echo "La venta fue exitosa con el id=".$id;
        }
        */
        $insertaDetalle="";
        $cantProd=count($_REQUEST['id']);
        for($i=0;$i<$cantProd;$i++){
            $subTotal=$_REQUEST['precio'][$i]*$_REQUEST['cantidad'][$i];
            $insertaDetalle=$insertaDetalle."('".$_REQUEST['id'][$i]."','$id','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['precio'][$i]."','$subTotal'),";
            $queryStock="SELECT stock from productos where id ='".$_REQUEST['id'][$i]."'; ";
            $obtenerStock=mysqli_query($conexion,$queryStock);
            $almacenarStock =mysqli_fetch_assoc($obtenerStock);
            $Stock = $almacenarStock['stock'] - $_REQUEST['cantidad'][$i];
            //echo $Stock;
            $queryActStock = "UPDATE productos set stock='".$Stock."' WHERE (id ='".$_REQUEST['id'][$i]."'); ";
            $actualizarStock = mysqli_query($conexion,$queryActStock);
        }
        $insertaDetalle=rtrim($insertaDetalle,",");
        $queryDetalle="INSERT INTO detalleventas 
        (id_producto, id_venta, cantidad, precio, subtotal) values 
        $insertaDetalle;";
        
        $resDetalle=mysqli_query($conexion,$queryDetalle);
        if($resVenta && $resDetalle){
        ?>
        <div class="row">
            <div class="col-6">
                <?php muestraRecibe($id); ?>
            </div>
            <div class="col-6">
                <?php muestraDetalle($id); ?>
            </div>
        </div>
        <?php
        borrarCarrito();
        }
    }
    function borrarCarrito(){
        ?>
            <script>
                $.ajax({
                    type: "post",
                    url: "ajax/borrarCarrito.php",
                    dataType: "json",
                    success: function (response) {
                        $("#badgeProducto").text("");
                        $("#listaCarrito").text("");
                    }
                });
            </script>
        <?php
    }
    function muestraRecibe($idVenta){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3" class="text-center">Persona que recibe</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                global $conexion;
                $queryRecibe="SELECT nombre,email,direccion 
                from recibe 
                where idCli='".$_SESSION['idCliente']."';";
                $resRecibe=mysqli_query($conexion,$queryRecibe);
                $row=mysqli_fetch_assoc($resRecibe);
            ?>
            <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['direccion'] ?></td>
            </tr>
        </tbody>
    </table>
    <?php
    }
    function muestraDetalle($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Detalle de venta</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    global $conexion;
                    $queryDetalle="SELECT
                    p.nombre,
                    dv.cantidad,
                    dv.precio,
                    dv.subtotal
                    FROM
                    ventas AS v
                    INNER JOIN detalleventas AS dv ON dv.id_venta = v.id
                    INNER JOIN productos AS p ON p.id = dv.id_producto
                    WHERE
                    v.id = '$idVenta'";
                    $resDetalle=mysqli_query($conexion,$queryDetalle);
                    $total=0;
                    while($row=mysqli_fetch_assoc($resDetalle)){
                        $total=$total+$row['subtotal'];
                ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo "S/.".$row['precio'] ?></td>
                    <td><?php echo "S/.".$row['subtotal'] ?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" class="text-right">Total:</td>
                    <td><?php echo "S/.".$total; ?></td>
                </tr>

            </tbody>
        </table>
        <a class="btn btn-secondary float-right" target="_blank" href="imprimirFactura.php?idVenta=<?php echo $idVenta; ?>" role="button">Imprimir factura (pdf)<i class="fas fa-file-pdf"></i> </a>
        <?php
        }



        
    
?>