  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
        <a href="<?php echo base_url();?>maintenance/Cproduct/">Productos</a>
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('correcto');?>"></div>
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="row">
          
              <?php if ($this->session->flashdata('error')):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata('error')?></p>
              </div>
              <?php endif; ?>
              <form action="<?php echo base_url();?>maintenance/Cproduct/store" method="POST">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="employee">Usuario</label>
                      <select name="txtemployee_id" id="txtemployee_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($employees as $employee):?> 
                              <option value="<?php echo $employee->id; ?>"><?php echo $employee->code." = ".$employee->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="employee">OCS Inventory</label>
                      <select name="txthardware_id" id="txthardware_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($hardwares as $hardware):?> 
                              <option value="<?php echo $hardware->ID; ?>"><?php echo " TAG = ".$hardware->TAG." | HOSTNAME = ".$hardware->NAME." | USUARIO = ".$hardware->USERID." | CATEGORIA = ".$hardware->TYPE." | MARCA = ".$hardware->SMANUFACTURER." | MODELO = ".$hardware->SMODEL." | SN = ".$hardware->SSN." | SO = ".$hardware->OSNAME
                              ; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="category">Categoría</label>
                      <select name="txtcategory_id" id="txtcategory_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($categories as $category):?> 
                              <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="brand">Marca</label>
                      <select name="txtbrand_id" id="txtbrand_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($brands as $brand):?> 
                              <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="model">Modelo</label>
                      <select name="txtmodel_id" id="txtmodel_id" class="form-control "  data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estado">Adquisición</label>
                      <select name="txtacquisition" id="txtacquisition" class="form-control "  required>
                          <option value="PROPIO" >PROPIO</option>
                          <option value="ALQUILADO" >ALQUILADO</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estado">Red</label>
                      <select name="txtnetwork" id="txtnetwork" class="form-control "  required>
                          <option value="IT" >IT</option>
                          <option value="OT" >OT</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estado">Antivirus</label>
                      <select name="txtantivirus" id="txtantivirus" class="form-control "  required>
                          <option value="SI" >SI</option>
                          <option value="NO" >NO</option>
                          <option value="NO_APLICA" >NO_APLICA</option>
                      </select>
                  </div>
                </div>
                
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="provider">Proveedor</label>
                      <select name="txtprovider_id" id="txtprovider_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($providers as $provider):?> 
                              <option value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="status_assignment">Estado </label>
                      <select name="txtstatus_assignment_id" id="txtstatus_assignment_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($status_assignments as $status_assignment):?> 
                              <option value="<?php echo $status_assignment->id; ?>"><?php echo $status_assignment->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="status_hardware">Estado Equipo</label>
                      <select name="txtstatus_hardware_id" id="txtstatus_hardware_id" class="form-control selectpicker" data-live-search="true" required>
                          <option value="">Seleccione ....</option>
                          <?php foreach ($status_hardwares as $status_hardware):?> 
                              <option value="<?php echo $status_hardware->id; ?>"><?php echo $status_hardware->name; ?></option>
                           <?php endforeach ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="txtdate_validation">Fecha Asignación</label>
                    <input type="date" name="txtdate_validation" id="txtdate_validation" class="form-control" value="<?php echo date("Y-m-d");?>" required>
                  </div>

                  <div class="form-group">
                    <label for="txtcod_inventory">Código de Inventario</label>
                    <input type="text" name="txtcod_inventory" id="txtcod_inventory" class="form-control" >
                  </div>

                </div>
                
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="txtdate_update">Fecha Actualización</label>
                    <input type="date" name="txtdate_update" id="txtdate_update" class="form-control">
                  </div> 

                  <div class="form-group">
                    <label for="txtdate_devolution">Fecha Devolución</label>
                    <input type="date" name="txtdate_devolution" id="txtdate_devolution" class="form-control">
                  </div> 

                  <div class="form-group">
                    <label for="txtreferencia1">Referencia 1</label>
                    <input type="text" name="txtreferencia1" id="txtreferencia1" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="txtreferencia2">Referencia 2</label>
                    <input type="text" name="txtreferencia2" id="txtreferencia2" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="txtreferencia3">Referencia 3</label>
                    <input type="text" name="txtreferencia3" id="txtreferencia3" class="form-control" >
                  </div>

                </div> 

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="txtcomment">Observaciones</label>
                    <textarea  name="txtcomment" id="txtcomment" rows="2"  class="form-control" ></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Guardar </button>
                      <a href="<?php echo base_url();?>maintenance/Cproduct/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
                  </div>
                </div> 

                
              </form>
            
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
