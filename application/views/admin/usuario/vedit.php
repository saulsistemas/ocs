  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar usuario</h3>

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
              <form action="<?php echo base_url();?>admin/Cusuario/cupdate" method="POST">
                <div class="col-md-6">
                  <input type="hidden" value ="<?php echo $usuario->idusuario ?>" id="txtidusuario" name="txtidusuario">
                  <div class="form-group <?php echo !empty(form_error('codigo'))? 'has-error' : '';?>">
                      <label for="codigo">Código</label>
                      <input type='text' id="txtcodigo" name="txtcodigo" value="<?php echo !empty(form_error('codigo'))? set_value('codigo') :$usuario->codigo ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                       <?php echo form_error('codigo','<span class="help-block">','</span>') ?>
                  </div>
                  <div class="form-group">
                      <label for="Nombre">Nombres</label>
                      <input type='text' id="txtnombre" name="txtnombre" value="<?php echo $usuario->nombre ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>

                  <div class="form-group">
                      <label for="nombre">Apellidos</label>
                      <input type='text' id="txtapellido" name="txtapellido" value="<?php echo $usuario->apellido ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>   
                  <div class="form-group">
                      <label for="nombre">Teléfono</label>
                      <input type='text' id="txttelefono" name="txttelefono" value="<?php echo $usuario->telefono1 ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Celular</label>
                      <input type='text' id="txtcelular" name="txtcelular" value="<?php echo $usuario->celular1 ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Correo</label>
                      <input type='text' id="txtcorreo" name="txtcorreo" value="<?php echo $usuario->correo1 ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>  
                  <div class="form-group ">
                    <label for="rol">Rol</label>
                    <select name="txtidrol" id="txtidrol" class="form-control selectpicker" data-live-search="true" required>
                        
                        <?php foreach ($rol as $atributos):?>
                          <?php if($atributos->idrol == $usuario->idrol ):?>
                            <option value="<?php echo $atributos->idrol; ?>"selected><?php echo $atributos->nombre; ?></option> 
                          <?php else: ?> 
                            <option value="<?php echo $atributos->idrol; ?>"><?php echo $atributos->nombre; ?></option>   
                          <?php endif ?>                              
                        <?php endforeach ?>
                    </select>
                  </div>                                   
                  <div class="form-group">
                      <label for="nombre">Username</label>
                      <input type='text' id="txtusername" name="txtusername" value="<?php echo $usuario->username ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Password</label>
                      <input type='Password' id="txtpassword" name="txtpassword" value="<?php echo $usuario->password ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>
 
                </div> 

                <div class="col-md-6">
                  <div class="form-group ">
                    <label for="documento">Documento</label>
                    <select name="txtiddocumento" id="txtiddocumento" class="form-control selectpicker" data-live-search="true" required>
                        <?php foreach ($documento as $atributos):?>
                          <?php if($atributos->iddocumento == $usuario->iddocumento ):?>
                            <option value="<?php echo $atributos->iddocumento; ?>"selected><?php echo $atributos->codigo.' = '.$atributos->nombre; ?></option>   
                          <?php else: ?> 
                            <option value="<?php echo $atributos->iddocumento; ?>"><?php echo $atributos->codigo.' = '.$atributos->nombre; ?></option>   
                          <?php endif ?>                             
                        <?php endforeach ?>
                    </select>
                  </div>    
                  <div class="form-group">
                      <label for="nombre">#Documento</label>
                      <input type='text' id="txtnumdocumento" name="txtnumdocumento" value="<?php echo $usuario->numdocumento ?>"class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>
                  <div class="form-group">
                      <label for="nombre">Cargo</label>
                      <input type='text' id="txtcargo" name="txtcargo" value="<?php echo $usuario->cargo ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>                  
                  <div class="form-group ">
                    <label for="documento">Área</label>
                    <select name="txtidarea" id="txtidarea" class="form-control selectpicker" data-live-search="true" required>
                        <?php foreach ($area as $atributos):?>
                          <?php if($atributos->idarea == $usuario->idarea ):?>
                            <option value="<?php echo $atributos->idarea; ?>"selected><?php echo $atributos->codigo.' = '.$atributos->nombre; ?></option>   
                          <?php else: ?> 
                            <option value="<?php echo $atributos->idarea; ?>"><?php echo $atributos->codigo.' = '.$atributos->nombre; ?></option>   
                          <?php endif ?>                             
                        <?php endforeach ?>

                    </select>
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Sede</label>
                      <input type='text' id="txtsede" name="txtsede" value="<?php echo $usuario->sede ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Sucursal</label>
                      <input type='text' id="txtsucursal" name="txtsucursal" value="<?php echo $usuario->sucursal ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div> 
                  <div class="form-group">
                      <label for="nombre">Piso</label>
                      <input type='text' id="txtpiso" name="txtpiso" value="<?php echo $usuario->piso ?>" class="form-control" onblur="this.value=this.value.toUpperCase();">
                  </div>  
                  <div class="form-group">
                      <label for="">Fecha Ingreso:</label>
                      <input type="date" class="form-control" name="txtfechaingreso" value="<?php echo $usuario->fechaingreso ?>" required>
                  </div>

                  <div class="form-group <?php echo ($usuario->estado == 1) ? "has-success" : "has-error";?>">
                      <label for="estado">Estado</label>
                      <select name="txtestado" id="txtestado" class="form-control "  required>
                         <option value="1" <?php if ($usuario->estado == 1) echo 'selected';?>>Activo</option>
                         <option value="2" <?php if ($usuario->estado == 2) echo 'selected';?>>Desactivo</option>
                     </select>
                 </div>                                                                                         
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Guardar </button>
                      <a href="<?php echo base_url();?>admin/Cusuario/" class="btn btn-default pull-right "><span class="fa fa-minus-circle"></span> Cancelar</a>
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
