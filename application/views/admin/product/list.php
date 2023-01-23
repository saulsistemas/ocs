  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <h1>
        Productos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
              <?php if($permisos->pinsert == 1): ?>
              <a href="<?php echo base_url();?>maintenance/Cproduct/create" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar </a>
              <?php endif; ?>
              

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
              <table id="user_data" class="table text-nowrap datatable table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Código</th>
                          <th>Usuario</th>
                          <th>Categoría</th>
                          <th>Marca</th>
                          <th>Modelo</th>   
                          <th>Serial</th>   
                          <th>SO</th>                                
                          <th>Procesador</th>
                          <th>Memoria</th>
                          <th>Hostname</th>
                          <th>Proveedor</th>
                          <th>Estado</th>
                          <th>Estado Equipo</th>
                          <th>Opciones</th>
                      </tr>
                  </thead>
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
    resp += "<p><strong><i class='fa fa-fw fa-tag'></i> Nombre: </strong>"+info[1] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Estado: </strong>"+info[2] +"  </p>"

    $("#modal-default .modal-body").html(resp);
    });

    $(document).on("click",".btn-print",function(){
    $("#modal-default .modal-body").print({
        title:"-"
    });
    });



</script>