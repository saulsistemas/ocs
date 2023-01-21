  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('correcto');?>"></div>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Marca</h3>

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
              <form action="<?php echo base_url();?>mantenimiento/Cmarca/cinsert" method="POST">
                <div class="form-group ">
                  <label for="categoria">Categoría</label>
                  <select name="txtidcategoria" id="txtidcategoria" class="form-control selectpicker" data-live-search="true" required>
                      <option value="">Seleccione ....</option>
                      <?php foreach ($categoria as $atributos):?>
                          <option value="<?php echo $atributos->idcategoria; ?>"><?php echo $atributos->codigo.' = '.$atributos->nombre; ?></option>   
                      <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type='text' id="txtnombre" name="txtnombre" class="form-control" onblur="this.value=this.value.toUpperCase();">
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
