<?php
  include_once "db_conexion.php";
  include_once "regresionLineal.php";

  $conexion = mysqli_connect($host, $user, $pass, $db,$port,$socket);
  $queryNumVentas="SELECT COUNT(id) AS num FROM ventas 
  WHERE fecha BETWEEN DATE( DATE_SUB(NOW(),INTERVAL 7 DAY) ) AND NOW(); ";
  $resNumVentas=mysqli_query($conexion,$queryNumVentas);
  $rowNumVentas=mysqli_fetch_assoc($resNumVentas);

  $queryNumTrabajadores="SELECT COUNT(id) AS num FROM usuarios; ";
  $resNumTrabajadores=mysqli_query($conexion,$queryNumTrabajadores);
  $rowNumTrabajadores=mysqli_fetch_assoc($resNumTrabajadores);

  $queryNumProd="SELECT COUNT(id) AS num FROM productos; ";
  $resNumProd=mysqli_query($conexion,$queryNumProd);
  $rowNumProd=mysqli_fetch_assoc($resNumProd);

  $queryNumClientes="SELECT COUNT(id) AS num FROM clientes; ";
  $resNumClientes=mysqli_query($conexion,$queryNumClientes);
  $rowNumClientes=mysqli_fetch_assoc($resNumClientes);
  $queryVentasDia="SELECT
  sum(detalleventas.subtotal) as total,
  ventas.fecha
  FROM
  ventas
  INNER JOIN detalleventas ON detalleventas.id_venta = ventas.id
  GROUP BY DAY(ventas.fecha);";
  $resVentasDia=mysqli_query($conexion,$queryVentasDia);
  $labelVentas="";
  $datosVentas="";

  $x=array();
  $y=array();
  $dia=1;

  while($rowVentasDia=mysqli_fetch_assoc($resVentasDia)){
      $labelVentas=$labelVentas."'". date_format(date_create($rowVentasDia['fecha']),"Y-m-d")."',";
      $datosVentas=$datosVentas.$rowVentasDia['total'].",";
      array_push($x,$dia);
      array_push($y,$rowVentasDia['total']);
      $dia++;
  }
  $ia=new IAphp();
  $prediccionVentas=$ia->regresionLineal($x,$y);
  $w=$prediccionVentas['w'];
  $b=$prediccionVentas['b'];
  $datosPrediccion="";
  for ($i=0; $i < count($x)+2; $i++) { 
    $venta=$w*($i+1)+$b;
    $datosPrediccion=$datosPrediccion."'".$venta."',";
  }

  $datosPrediccion=rtrim($datosPrediccion,",");
  $labelVentas=rtrim($labelVentas,",");
  $datosVentas=rtrim($datosVentas,",");

?>
<script>
  var labelVentas= [<?php echo $labelVentas;?>,'2021-09-09','2021-09-10'];
  var datosVentas = [<?php echo $datosVentas;?>];
  var datosPrediccion=[<?php echo $datosPrediccion; ?>];
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> -->
          <!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $rowNumVentas['num']?></h3>

                <p>Ventas en los ultimos 7 dias</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rowNumTrabajadores['num']-1;?><sup style="font-size: 20px"></sup></h3>

                <p>Trabajadores</p>
              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rowNumClientes['num']?></h3>

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rowNumProd['num']?></h3>

                <p>N° Productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-egg"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Ventas
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <!-- <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a> -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a> -->
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- TO DO List -->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <!-- /.card -->

            <!-- solid sales graph -->
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->