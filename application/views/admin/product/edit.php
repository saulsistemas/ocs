  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
        <a href="<?php echo base_url();?>maintenance/Cproduct/">Productos</a>
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
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
          <div class="col-md-12">
              <?php if ($this->session->flashdata('error')):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata('error')?></p>
              </div>
              <?php endif; ?>
              <form action="<?php echo base_url();?>maintenance/Cproduct/update" method="POST">
                  <input type="hidden" value ="<?php echo $product->id ?>" id="txtidproduct" name="txtidproduct">
                  <div class="form-group">
                    <label for="brand">Marca</label>
                    <select name="txtbrand_id" id="txtbrand_id" class="form-control selectpicker" data-live-search="true" required>
                      <?php foreach ($brands as $brand):?> 
                        <?php if($brand->id == $product->brand_id ):?>   
                            <option value="<?php echo $brand->id; ?>" selected><?php echo $brand->name; ?></option>
                              <?php else: ?>
                            <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>                                       
                        <?php endif ?>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group <?php echo !empty(form_error('txtname'))? 'has-error' : '';?>">
                      <label for="codigo">Nombre</label>
                      <input type='text' id="txtname" name="txtname" value="<?php echo !empty(form_error('name'))? set_value('nombre') :$product->name ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                       <?php echo form_error('txtname','<span class="help-block">','</span>') ?>
                  </div>
                  
                  <div class="form-group <?php echo ($product->status == "HABILITADO") ? "has-success" : "has-error";?>">
                      <label for="estado">Estado</label>
                      <select name="txtstatus" id="txtstatus" class="form-control "  required>
                         <option value="HABILITADO" <?php if ($product->status == "HABILITADO") echo 'selected';?>>HABILITADO</option>
                         <option value="DESHABILITADO" <?php if ($product->status == "DESHABILITADO") echo 'selected';?>>DESHABILITADO</option>
                     </select>
                 </div> 
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Guardar </button>
                      <a href="<?php echo base_url();?>maintenance/Cproduct/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
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
