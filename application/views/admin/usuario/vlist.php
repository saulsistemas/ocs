  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de usuario</h3>

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
              <a href="<?php echo base_url();?>admin/Cusuario/cadd" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar </a>
              <?php endif; ?>
              <br><br>
              <table id="user_datau" class="table text-nowrap datatable table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Apellidos</th> 
                          <th>Rol</th>      
                          <th>Teléfono</th> 
                          <th>Celular</th>                            
                          <th>Estado</th>
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
    $(document).on("click",".btn-view",function(){    
     
    var data = $(this).val();                
    var info =  data.split("*");
    resp = "<p><strong><i class='fa fa-fw fa-qrcode'></i> ID: </strong>"+info[0] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tag'></i> Código: </strong>"+info[1] +"  </p>"
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Nombre: </strong>"+info[2] +"  </p>" 
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Apellido: </strong>"+info[3] +"  </p>" 
    resp += "<p><strong><i class='fa fa-fw fa-tags'></i> Rol: </strong>"+info[4] +"  </p>" 
    $("#modal-default .modal-body").html(resp);
    });

    $(document).on("click",".btn-print",function(){
    $("#modal-default .modal-body").print({
        title:"-"
    });
});

$(document).ready(function(){ 
  var dataTable = $('#user_datau').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/Cusuario/fetch_user'; ?>",  
                type:"POST"  
           },  
              dom: 'lBfrtip',
              buttons: [
               //'excel', 'csv', 'pdf', 'copy'
                           {
                extend: 'excelHtml5',
                title: "Usuarios",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5,6 ]
                }
              },
              ],
           "columnDefs":[  
                {  
                     "targets":[ 8],  
                     "orderable":false,  
                },  
           ],

                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No se encontraron resultados en su busqueda",
                    "searchPlaceholder": "Buscar registros",
                    "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                    "infoEmpty": "No existen registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }  
});
});
</script>