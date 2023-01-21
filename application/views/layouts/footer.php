        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">Help Net</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->

<script src="<?php echo base_url();?>assets/template/lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<script src="<?php echo base_url();?>assets/template/alert/dist/sweetalert.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/select2/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
$(document).ready(function () {
    
        //MENU ACTIVO
        var url = window.location.href;
         // for sidebar menu entirely but not cover treeview
         $('ul.sidebar-menu a').filter(function() {
         return this.href == url;
         }).parent().addClass('active');
         // for treeview
         $('ul.treeview-menu a').filter(function() {
         return this.href == url;
         }).closest('.treeview').addClass('active');



            var base_url= "<?php echo base_url();?>";

              
        
          
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Listado de Ventas",
                    exportOptions: {
                        columns: [ 0, 1,2, 3, 4, 5 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "Listado de Ventas",
                    exportOptions: {
                        columns: [ 0, 1,2, 3, 4, 5 ]
                    }
                    
                }
            ],

            language: {
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

        
        
        $('#example1').DataTable({
            
            dom: 'Blfrtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Listado de Categorias",
                    exportOptions: {
                        columns: [ 0, 1,2]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "Listado de Categorias",
                    exportOptions: {
                        columns: [ 0, 1,2]
                    }
                }
            ],
            order: [
                [0, 'desc']
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
        
        $('#example2').DataTable({
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
        
        $('#example3').DataTable({
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
        $('.sidebar-menu').tree();
        
        $(document).on("click",".btn-print",function(){
            $("#modal-default .modal-body").print({
                title:"COMPROBANTE VENTA"
            });
        });
        $(document).on("click",".btn-printi",function(){
            $("#modal-default .modal-body").print({
                title:"COMPROBANTE INGRESO"
            });
        });
        
        })
        
        
        

        


        
       

        //MENSAJE DE CONFIRMACION
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata) {
            swal({
            title: "Se ha guardado Correctamente!",            
            type: "success",
            button: "Cerrar!",
          });
        }

        //MENSAJE DE ERRO
        const flashdatae = $('.flash-dataerror').data('flashdata');
        if (flashdatae) {
            swal({
            title: "Agregar Productos!",            
            type: "error",
            button: "Cerrar!",
          });
        }

        $(".btn-remove").on("click", function(e){
                e.preventDefault(); //cancela la accion del Href               
                var ruta = $(this).attr("href"); 
                 swal({
                    title: "¿Realmente quieres eliminar el registro?",
                    text: "¡No podrás revertir esto!",                    
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#d9534f',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "¡Sí!",
                    showLoaderOnConfirm: true,
                    cancelButtonText: "¡No!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },function(isConfirm){
                        if (isConfirm) {
                            $.ajax({
                                url: ruta,
                                type: "POST",
                                success:function(res){
                                  window.location.href=base_url+res;
                                }            
                            });
                        } else {
                            swal("Cancelado","", "error");
                        }
                    }
                    );
            });
   

                function imprim2(){
                var mywindow = window.open('', 'PRINT', 'height=400,width=600');
                mywindow.document.write('<html><head>');
                mywindow.document.write('<style>.list-table{width:100%;border-collapse:collapse;margin:16px 0 16px 0;}.list-table th{border:1px solid #ddd;padding:4px;background-color:#d4eefd;text-align:left;font-size:15px;}.list-table td{border:1px solid #ddd;text-align:left;padding:6px;}</style>');
                mywindow.document.write('</head><body >');
                mywindow.document.write(document.getElementById('muestra').innerHTML);
                mywindow.document.write('</body></html>');
                mywindow.document.close(); // necesario para IE >= 10
                mywindow.focus(); // necesario para IE >= 10
                mywindow.print();
                mywindow.close();
                return true;}














           
      
</script>
</body>
</html>
