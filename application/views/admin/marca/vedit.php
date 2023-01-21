  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Marca</h3>

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
          <div class="col-md-12">
              <?php if ($this->session->flashdata('error')):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata('error')?></p>
              </div>
              <?php endif; ?>
              <form action="<?php echo base_url();?>mantenimiento/Cmarca/cupdate" method="POST">
                  <input type="hidden" value ="<?php echo $marca->idmarca ?>" id="txtidmarca" name="txtidmarca">
                  <div class="form-group <?php echo !empty(form_error('codigo'))? 'has-error' : '';?>">
                      <label for="codigo">Código</label>
                      <input type='text' id="txtcodigo" name="txtcodigo" value="<?php echo !empty(form_error('codigo'))? set_value('codigo') :$marca->codigo ?>" class="form-control" onblur="this.value=this.value.toUpperCase();" readonly>
                       <?php echo form_error('codigo','<span class="help-block">','</span>') ?>
                  </div>
                  <div class="form-group">
                      <label for="Nombre">Nombre</label>
                      <input type='text' id="txtnombre" name="txtnombre" value="<?php echo $marca->nombre ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>
                  <div class="form-group <?php echo ($marca->estado == 1) ? "has-success" : "has-error";?>">
                      <label for="estado">Estado</label>
                      <select name="txtestado" id="txtestado" class="form-control "  required>
                         <option value="1" <?php if ($marca->estado == 1) echo 'selected';?>>Activo</option>
                         <option value="2" <?php if ($marca->estado == 2) echo 'selected';?>>Desactivo</option>
                     </select>
                 </div> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Guardar </button>
                      <a href="<?php echo base_url();?>mantenimiento/Cmarca/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
                  </div>  
              </form>
          </div>   
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
