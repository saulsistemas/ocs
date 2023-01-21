

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  	<nav class="navbar bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      HELP NET
	    </a>
	  </div>
	</nav>
  <div class="container-fluid">

    <h1>DASHBOARD HELP NET</h1>
    <form action="<?php echo current_url();?>" method="POST">
      <select name="estado1" id="estado1" class="form-control">
        <option value="0" <?php if ($estatus == 0) echo 'selected';?>>TODOS</option>
        <option value="1" <?php if ($estatus == 1) echo 'selected';?>>ASIGNADO</option>
        <option value="2" <?php if ($estatus == 2) echo 'selected';?>>EN ALMACEN</option>
        <option value="3" <?php if ($estatus == 3) echo 'selected';?>>PRESTAMO</option>
        <option value="4" <?php if ($estatus == 4) echo 'selected';?>>ROBADO</option>
      </select>

      <input type="submit" name="txtbuscar" value="Buscar">

    </form>
    <div class="row">
      <div class="col">
        <div class="card-body">
              <canvas id="myChart" ></canvas>
        </div>
      </div>
      <div class="col">
        <div class="card-body">
              <canvas id="myChart1" ></canvas>
        </div>
      </div>
      <div class="col">
      <div class="card-body">
              <canvas id="myChart2" ></canvas>
        </div>
      </div>

    </div>
    
    <br>
    <h4 class="m-0"><?php // var_dump($data); ?> <small></small></h4>
    <div class="table-responsive">
      <table id="user_datad" class="table text-nowrap datatable table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Hostname</th>
                <th>Grupo de Trabajo</th>
                <th>Sistema Operativo</th>   
                <th>Procesador</th>   
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($harwares)):?>
            <?php foreach ($harwares as $harware):?>   
            <tr>
                <td><?php echo $harware->ID; ?></td>
                <td><?php echo $harware->DEVICEID; ?></td>
                <td><?php echo $harware->NAME; ?></td>
                <td><?php echo $harware->WORKGROUP; ?></td>
                <td><?php echo $harware->OSNAME; ?></td>                                    
                <td><?php echo $harware->PROCESSORT; ?></td>                                    
            </tr> 
        <?php endforeach ?>
        <?php endif; ?>
        </tbody>
      </table>

      <br>
      <br>

      <table id="user_datad" class="table text-nowrap datatable table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>TAG</th>
                <th>SEDE</th>
                <th>CATEGORIA</th>
                <th>ADQUISICION</th>   
                <th>COD INVENTARIO	</th>   
                <th>MARCA</th>   
                <th>MODELO</th>   
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($accountinfos)):?>
            <?php foreach ($accountinfos as $accountinfo):?>   
            <tr>
              <td><?php echo $accountinfo->HARDWARE_ID; ?></td>
              <td><?php echo $accountinfo->TAG; ?></td>
              <td><?php if ($accountinfo->fields_5 == 1){ echo "SAN_BORJA";}elseif($accountinfo->fields_5 == 2){echo "AREQUIPA";}elseif($accountinfo->fields_5 == 3){echo "CHICLAYO";}elseif($accountinfo->fields_5 == 4){echo "CUSCO";}elseif($accountinfo->fields_5 == 5){echo "HUANCAYO";}elseif($accountinfo->fields_5 == 6){echo "PIURA";}elseif($accountinfo->fields_5 == 7){echo "PPAL";}elseif($accountinfo->fields_5 == 8){echo "PUCALLPA";}elseif($accountinfo->fields_5 == 9){echo "PVEN";}elseif($accountinfo->fields_5 == 9){echo "TRUJILLO";}else{echo "NO ASIGNADO";}?></td>
              <td><?php if ($accountinfo->fields_6 == 1){ echo "ALL IN ONE";}elseif($accountinfo->fields_6 == 2){echo "CELULAR";}elseif($accountinfo->fields_6 == 3){echo "DESKTOP";}elseif($accountinfo->fields_6 == 4){echo "IMPRESORA";}elseif($accountinfo->fields_6 == 5){echo "LAPTOP";}elseif($accountinfo->fields_6 == 6){echo "MONITOR";}elseif($accountinfo->fields_6 == 7){echo "SERVIDOR";}elseif($accountinfo->fields_6 == 8){echo "TABLET";}else{echo "NO ASIGNADO";}?></td>
              <td><?php if ($accountinfo->fields_7 == 1){ echo "ALQUILADO";}elseif($accountinfo->fields_7 == 2){echo "PROPIO";}else{echo "NO ASIGNADO";} ?></td>                                    
                <td><?php echo $accountinfo->fields_8; ?></td>                                    
              <td><?php if ($accountinfo->fields_9 == 1){ echo "DELL";}elseif($accountinfo->fields_9 == 2){echo "EPSON";}elseif($accountinfo->fields_9 == 3){echo "HP";}elseif($accountinfo->fields_9 == 4){echo "LENOVO";}elseif($accountinfo->fields_9 == 5){echo "RICOH";}elseif($accountinfo->fields_9 == 6){echo "IPHONE";}elseif($accountinfo->fields_9 == 7){echo "MOTOROLA";}elseif($accountinfo->fields_9 == 8){echo "SAMSUNG";}else{echo "NO ASIGNADO";}?></td>
                                   
              <td><?php echo $accountinfo->fields_10; ?></td>                                    
            </tr> 
        <?php endforeach ?>
        <?php endif; ?>
        </tbody>
      </table>

    </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

            const ctx = document.getElementById('myChart');
            const cData = JSON.parse('<?php echo $data;?>');
            console.log(cData);
            
            //if(cData.fields_5 = 2){
            //  console.log('fdsfds');
            //}
            new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: cData.campo,
                  datasets: [{
                    label: 'Equipos Por Planta',
                    data: cData.cantidad,
                    borderWidth: 1
                  }]
                },
                options: {
                  indexAxis: 'y',
                }
              });
            const ctx1 = document.getElementById('myChart1');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                  labels: cData.campo1,
                  datasets: [{
                    label: 'Equipos Por Modelo',
                    data: cData.cantidad1,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });

              const ctx2 = document.getElementById('myChart2');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                  labels: cData.campo2,
                  datasets: [{
                    label: 'Equipos Por Tipo',
                    data: cData.cantidad2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
      
  </script>
  </body>
</html>