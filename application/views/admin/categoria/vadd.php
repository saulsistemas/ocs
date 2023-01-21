  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('correcto');?>"></div>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"> Agregar Categoría</h3>

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
              <form action="<?php echo base_url();?>mantenimiento/Ccategoria/cinsert" method="POST">
                <div class="form-group <?php echo !empty(form_error('codigo'))? 'has-error' : '';?>">
                    <label for="codigo">Código</label>
                    <input type='text' id="txtcodigo" name="txtcodigo" class="form-control" value="<?php echo set_value('codigo') ?>" onblur="this.value=this.value.toUpperCase();">
                    <?php echo form_error('codigo','<span class="help-block">','</span>') ?>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type='text' id="txtnombre" name="txtnombre" class="form-control" onblur="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="nombre">Atributo1</label>
                    <input type='text' id="txtatributo1" name="txtatributo1" class="form-control" onblur="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="nombre">Atributo2</label>
                    <input type='text' id="txtatributo2" name="txtatributo2" class="form-control" onblur="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <label for="nombre">Atributo3</label>
                    <input type='text' id="txtatributo3" name="txtatributo3" class="form-control" onblur="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar </button>
                    <a href="<?php echo base_url();?>mantenimiento/Ccategoria/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
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
