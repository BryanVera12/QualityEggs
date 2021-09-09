<div class="content-wrapper">
  <div class="row mt-2">
  <?php
     //include_once "db_conexion.php";
     //$conexion=mysqli_connect($host,$user,$pass,$db);
    $where="where 1=1";
    $nombre=mysqli_real_escape_string($conexion,$_REQUEST['nombre']??'');
    if(empty($nombre)==false){
      $where="and nombre like '%".$nombre."%'";
    }


    //$queryCuenta="SELECT COUNT(*) AS cuenta FROM productos $where ;";
    $queryCuenta="SELECT COUNT(*) AS cuenta FROM productos ;";
    $resCuenta=mysqli_query($conexion,$queryCuenta);
    $rowCuenta=mysqli_fetch_assoc($resCuenta);
    $totalRegistros=$rowCuenta['cuenta'];

    $elementosPorPagina=6;
    $totalPaginas=ceil($totalRegistros/$elementosPorPagina);

    $paginaSelec=$_REQUEST['pagina']??false;

    if($paginaSelec==false){
      $inicioLimite=0;
      $paginaSelec=1;
    }else{
      $inicioLimite=($paginaSelec-1)*$elementosPorPagina;
    }
    $limite=" limit $inicioLimite, $elementosPorPagina";


    $query="SELECT
      p.id,
      p.nombre,
      p.precio,
      p.stock,
      f.web_path
      FROM
      productos AS p
      INNER JOIN productos_files AS pf ON pf.producto_id=p.id
      INNER JOIN files AS f ON f.id=pf.file_id
      $where
      GROUP BY p.id
      $limite";

      $result=mysqli_query($conexion,$query);
      while($row=mysqli_fetch_assoc($result)){
      ?>
        <div class="col-log-4">
          <div class="card border-white">
          <!-- <div class="card-border-primary"> -->
            <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?>" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $row['nombre'] ?></h4>
              <p class="card-text"><strong>Precio:</strong><?php echo " ".$row['precio']." soles" ?></p>
              <p class="card-text"><strong>Stock:</strong><?php echo " ".$row['stock']." unidades" ?></p>
              <?php
              if($row['stock']>0){

              
              
              ?>
              <a href="panel_2.php?modulo=detalle_producto&id=<?php echo $row['id'] ?>" class="btn btn-primary" >Ver</a>
              <?php 
              }else{
              ?>
              <a href="#" class="btn btn-secondary" disabled  >Agotado</a>
            <?php 
            }
            ?>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
</div>

<?php
  if($totalPaginas>0){
    ?>
      <nav aria-label="Page navigation">
        <ul class="pagination">
        <!-- <ul class="pagination justify-content-center"> -->
          <?php
            if($paginaSelec!=1){

            
          ?>
          <li class="page-item">
            <a class="page-link" href="panel_2.php?modulo=productos_2&pagina=<?php echo ($paginaSelec-1)?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <?php
            }
          ?>
          <?php
            for($i=1;$i<=$totalPaginas; $i++){

            
          ?>
          <li class="page-item <?php echo ($paginaSelec==$i)?"active":" "; ?>">
            <a class="page-link" href="panel_2.php?modulo=productos_2&pagina=<?php echo $i;?>"><?php echo $i; ?></a>
          </li>
          <?php
            }
          ?>

          <?php
            if($paginaSelec!=$totalPaginas){
          ?>

          <li class="page-item">
            <a class="page-link" href="panel_2.php?modulo=productos_2&pagina=<?php echo ($paginaSelec+1)?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
          <?php
            }
          ?>

        </ul>
</nav>
      
    <?php
  }
?>