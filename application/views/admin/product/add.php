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
                    <label for="employee">Usuario</label>
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

                  <div class="form-group <?php echo !empty(form_error('txtname'))? 'has-error' : '';?>">
                      <label for="nombre">Nombre</label>
                      <input type='text' id="txtname" name="txtname" class="form-control" value="<?php echo set_value('nombre') ?>" onblur="this.value=this.value.toUpperCase();">
                      <?php echo form_error('txtname','<span class="help-block">','</span>') ?>
                  </div>

                  <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="txtstatus" id="txtstatus" class="form-control "  required>
                           <option value="HABILITADO" >HABILITADO</option>
                           <option value="DESHABILITADO" >DESHABILITADO</option>
                       </select>
                  </div> 

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar </button>
                    <a href="<?php echo base_url();?>maintenance/Cproduct/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
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
