  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
        Dashboard
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
                <canvas id="myChart" ></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
                <canvas id="myChart1" ></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
                <canvas id="myChart2" ></canvas>
              </div>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-md-12">
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

        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

