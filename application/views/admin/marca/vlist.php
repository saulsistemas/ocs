  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Marca</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('correcto');?>"></div>
        <div class="box-body">
          <div class="table-responsive">
              <?php if($permisos->rinsert == 1): ?>
              <a href="<?php echo base_url();?>mantenimiento/Cmarca/cadd" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar </a>
              <?php endif; ?>
              <br><br>
              <table id="example1" class="table text-nowrap datatable table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Código</th>
                          <th>Categoría</th>
                          <th>Marca</th>                                  
                          <th>Estado</th>
                          <th>Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if (!empty($marca)):?>
                      <?php foreach ($marca as $atributos):?>   
                      <tr>
                          <td><?php echo $atributos->idmarca; ?></td>
                          <td><?php echo $atributos->codigo; ?></td>
                          <td><?php echo $atributos->categoria; ?></td>
                          <td><?php echo $atributos->nombre; ?></td>                                    
                          <?php 
                            if ($atributos->estado == 1) {
                            $style='class="label label-success"';
                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p>";
                            }else{
                            $style='class="label label-danger"';
                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivo</font></span></p>";
                            }                                    
                          ?> 
                          <?php $datamarca = $atributos->idmarca."*".$atributos->codigo."*".$atributos->categoria."*".$atributos->nombre ?>
                          <td>
                              <div class="btn-group">
                              <button type="button" class="btn btn-info btn-view btn-flat" data-toggle="modal" data-target="#modal-default" value="<?php echo $datamarca; ?>">
                                <span class="fa fa-print"></span>                                       
                              </button>
                               
                              <?php if($permisos->rupdate == 1): ?>
                               <a href="<?php echo base_url();?>mantenimiento/Cmarca/cedit/<?php echo $atributos->idmarca; ?>" class="btn btn-warning btn-flat">
                                  <span class="fa fa-pencil"></span>
                              </a>
                              <?php endif; ?>
                              <?php if($permisos->rdelete == 1): ?>
                               <a href="<?php echo base_url();?>mantenimiento/Cmarca/cdelete/<?php echo $atributos->idmarca; ?>" class="btn btn-danger btn-remove btn-flat">
                                  <span class="fa fa-remove"></span>
                              </a>
                              <?php endif; ?>
                              </div>
                          </td>
                      </tr> 
                  <?php endforeach ?>
                  <?php endif; ?>
                  </tbody>
              </table>
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

  <div class="modal fade " id="modal-default" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">×</font></font></span></button>
          <h4 class="modal-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Información</font></font></h4>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal"><span class="fa fa-minus-circle"> </span> Cancelar</button>
          <button type="button" class="btn btn-primary btn-print btn-flat" data-dismiss="modal"><span class="fa fa-print"> </span> Imprimir</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<script type="text/javascript">
     //MODAL 
    var base_url= "<?php echo base_url();?>";
   $(".btn-view").on("click", function(){    
    var data = $(this).val();                
    var info =  data.split("*");
    resp = "<p><strong><i class='fa fa-fw fa-qrcode'></i> ID: </strong>"+info[0] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tag'></i> Código: </strong>"+info[1] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Categoría: </strong>"+info[2] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Marca: </strong>"+info[3] +"  </p>"  
    $("#modal-default .modal-body").html(resp);
    });

    $(document).on("click",".btn-print",function(){
    $("#modal-default .modal-body").print({
        title:"-"
    });
});

</script>