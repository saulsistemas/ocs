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

         //$("#ocmenu").on("click", function(){            
         //   return this.href == url;            
         //}).closest('body').addClass('sidebar-collapse');
        //FIN MENU ACTIVO
        


            var base_url= "<?php echo base_url();?>";
            main();

            //if ($("#ventarapida")) {
            //   cargarselect();  
            //}
///////////////////////////////////////////////////
        function main(){
            mostrarDatos("",1,30);    
            $("input[name=busqueda]").keyup(function(){
                textobuscar = $(this).val();
                valoroption = $("#cantidad").val();
                mostrarDatos(textobuscar,1,valoroption);
            });
        
            $("body").on("click",".paginacion li a",function(e){
                e.preventDefault();
                valorhref = $(this).attr("href");
                valorBuscar = $("input[name=busqueda]").val();
                valoroption = $("#cantidad").val();
                mostrarDatos(valorBuscar,valorhref,valoroption);
            });
        
            $("#cantidad").change(function(){
                valoroption = $(this).val();
                valorBuscar = $("input[name=busqueda]").val();
                mostrarDatos(valorBuscar,1,valoroption);
            });
            }
                function mostrarDatos(valorBuscar,pagina,cantidad){                
                    $.ajax({
                        url : base_url + "movimientos/cventarap/mostrar",
                        type: "POST",
                        data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad},
                        dataType:"json",
                        success:function(response){
                          
                            filas = "";
                            $.each(response.databuscar,function(key,item){
                                var id = item.idproducto;
                                var codigo = item.codigo;
                                var nombre = item.nombre;
                                var precio = item.precio;
                                var stockventa = item.stockventa;
                                var img = item.imagen;
                                var dataproducto=id+'*'+codigo+'*'+nombre+'*'+precio+'*'+stockventa;              
                                // nombre = nombre.substr(0, 60) + " ...";
                                    filas+= '<button type="button"  class="btn btn-both btn-flat datosvenra"  value="'+dataproducto+'"  >'+'<div class="bg-img">'+"<img  src='<?=base_url()?>uploads/imagenes/" + img +"' style='width: 100px; height: 100px; '>"+ '</div>'+ "<span data-toggle='tooltip' title='"+ nombre +"'>"+ codigo + "<br>"+ nombre +"</span>"+ "</button>";
                
                            });
                           
                            $("#item-list div").html(filas);
                            linkseleccionado = Number(pagina);
                            
                            totalregistros = response.totalregistros;//total registros           
                            cantidadregistros = response.cantidad; //cantidad de registros por pagina
                            numerolinks = Math.ceil(totalregistros/cantidadregistros);
                
                
                            paginador = "<ul class='pagination'>";
                            if(linkseleccionado>1)
                            {
                                paginador+="<li><a href='1'>&laquo;</a></li>";
                                paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";
                
                            }
                            else
                            {
                                paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
                                paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
                            }
                            //muestro de los enlaces 
                            //cantidad de link hacia atras y adelante
                            cant = 2;
                            //inicio de donde se va a mostrar los links
                            pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
                            //condicion en la cual establecemos el fin de los links
                            if (numerolinks > cant)
                            {
                                //conocer los links que hay entre el seleccionado y el final
                                pagRestantes = numerolinks - linkseleccionado;
                                //defino el fin de los links
                                pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
                            }
                            else 
                            {
                                pagFin = numerolinks;
                            }
                
                            for (var i = pagInicio; i <= pagFin; i++) {
                                if (i == linkseleccionado)
                                    paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
                                else
                                    paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
                            }
                            //condicion para mostrar el boton sigueinte y ultimo
                            if(linkseleccionado<numerolinks)
                            {
                                paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
                                paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";
                
                            }
                            else
                            {
                                paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
                                paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
                            }
                            
                            paginador +="</ul>";
                            $(".paginacion").html(paginador);
                
                        }
                    });
                }
///////////////////////////////////////////////////







            var year = (new Date).getFullYear();
            var yeari = (new Date).getFullYear();
            //----------GRAFICOS
            datagrafico (base_url,year);
            datagraficoi (base_url,yeari);
            datagraficotop (base_url);
            datagraficovdia(base_url,year);
            datagraficoanos(base_url,year);

            $("#year").on("change",function(){
                yearselect = $(this).val();
                datagrafico(base_url,yearselect);
            });
            $("#yeari").on("change",function(){
                yearselect = $(this).val();
                datagraficoi(base_url,yearselect);
            });
            //FIN GRAFICOS

            //ELIMINAR REGISTRO
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
        
            //SELECCIONAR FACTOR
             $("#txtunimedida").change(function() {
        
                            $("#txtunimedida option:selected").each(function() {
                                id = $('#txtunimedida').val();                        
                                $.post("<?php echo base_url(); ?>mantenimiento/cproducto/ccombounidad2", {
                                    id : id
                                }, function(data) {
                                    $("#txtunimedidaventa").html(data);
                                    document.getElementById("txtunimedidaventa").disabled =false; 
                                });
                            });
                        });
            //SELECCIONAR FACTOR
            //modal    
            $(".btn-view").on("click", function(){    
                var id = $(this).val();
               // alert(id);
                $.ajax({
                    url: base_url + "mantenimiento/ccategoria/cview/" + id,
                    type: "POST",
                    success:function(res){
                        $("#modal-default .modal-body").html(res);
                       // alert(data);
                    }
            
                });
            });
         //MODAL CLIENTE  
                $(".btn-view-cliente").on("click", function(){    
                var cliente = $(this).val();
                //alert(cliente);
                var infocliente =  cliente.split("*");
                resp = "<p><strong>Nombre: </strong>"+infocliente[1] +"  </p>"
                resp += "<p><strong>tipocliente: </strong>"+infocliente[2] +"  </p>"
                resp += "<p><strong>tipodocumento: </strong>"+infocliente[3] +"  </p>"
                resp += "<p><strong>num_documento: </strong>"+infocliente[4] +"  </p>"
                resp += "<p><strong>Telefono: </strong>"+infocliente[5] +"  </p>"
                resp += "<p><strong>Direccion: </strong>"+infocliente[6] +"  </p>";
                $("#modal-default .modal-body").html(resp);
            });
             //MODAL PROVEEDOR  
                $(".btn-view-proveedor").on("click", function(){    
                var cliente = $(this).val();
                //alert(cliente);
                var infocliente =  cliente.split("*");
                resp = "<p><strong>Nombre: </strong>"+infocliente[1] +"  </p>"
                resp += "<p><strong>tipocliente: </strong>"+infocliente[2] +"  </p>"
                resp += "<p><strong>tipodocumento: </strong>"+infocliente[3] +"  </p>"
                resp += "<p><strong>num_documento: </strong>"+infocliente[4] +"  </p>"
                resp += "<p><strong>Telefono: </strong>"+infocliente[5] +"  </p>"
                resp += "<p><strong>Direccion: </strong>"+infocliente[6] +"  </p>";
                $("#modal-default .modal-body").html(resp);
            });
         //MODAL PRODUCTO  
                $(".btn-view-producto").on("click", function(){    
                var producto = $(this).val();
                //alert(cliente);
                var infoproducto =  producto.split("*");
                resp = "<p><strong>Código: </strong>"+infoproducto[1] +"  </p>"
                resp += "<p><strong>Nombre: </strong>"+infoproducto[2] +"  </p>"
                resp += "<p><strong>Descripción: </strong>"+infoproducto[3] +"  </p>"
                resp += "<p><strong>Precio: </strong>"+infoproducto[4] +"  </p>"
                resp += "<p><strong>Stcok: </strong>"+infoproducto[5] +"  </p>"
                resp += "<p><strong>Categoria: </strong>"+infoproducto[6] +"  </p>";
                $("#modal-default .modal-body").html(resp);
            });
        
            //MODAL MARCA  
                $(".btn-view-factorco").on("click", function(){    
                var marca = $(this).val();
                //alert(cliente);
                var infoproducto =  marca.split("*");
                resp = "<p><strong>Descripción: </strong>"+infoproducto[1] +"  </p>"
                resp += "<p><strong>Un.Ori: </strong>"+infoproducto[2] +"  </p>"
                resp += "<p><strong>Origen: </strong>"+infoproducto[3] +"  </p>"
                resp += "<p><strong>Un.Dest: </strong>"+infoproducto[4] +"  </p>"
                resp += "<p><strong>Destino: </strong>"+infoproducto[5] +"  </p>"
                resp += "<p><strong>Valor: </strong>"+infoproducto[6] +"  </p>"
                $("#modal-default .modal-body").html(resp);
            });
            //MODAL MARCA  
                $(".btn-view-marca").on("click", function(){    
                var marca = $(this).val();
                //alert(cliente);
                var infoproducto =  marca.split("*");
                resp = "<p><strong>Nombre: </strong>"+infoproducto[1] +"  </p>"
                resp += "<p><strong>Descripción: </strong>"+infoproducto[2] +"  </p>"   
                $("#modal-default .modal-body").html(resp);
            });
        
        //---------------------------------------------------------------------------
         //COMBO COMPROBANTE  VENTA
                $("#txtcomprobantes").on("change", function(){    
                 var option = $(this).val();            
                    if (option !="") {
                         var infocomprobante =  option.split("*");                
                        $("#txtidcomprobante").val(infocomprobante[0]);
                        $("#txtigv").val(infocomprobante[2]);
                        $("#txtserie").val(infocomprobante[3]);
                        $("#txtnumero").val(generarnumero(infocomprobante[1]));  
                    }else{
                        $("#txtidcomprobante").val(null);
                        $("#txtigv").val(null);
                        $("#txtserie").val(null);
                        $("#txtnumero").val(null);
                    }
                    sumar();       
                });
         //COMBO COMPROBANTE  INGRESO
                $("#txtcomprobantesi").on("change", function(){    
                 var option = $(this).val();            
                    if (option !="") {
                         var infocomprobante =  option.split("*");                
                        $("#txtidcomprobantei").val(infocomprobante[0]);
                        $("#txtigvi").val(infocomprobante[2]);
                        $("#txtseriei").val(infocomprobante[3]);
                        $("#txtnumeroi").val(generarnumero(infocomprobante[1]));  
                    }else{
                        $("#txtidcomprobantei").val(null);
                        $("#txtigvi").val(null);
                        $("#txtseriei").val(null);
                        $("#txtnumeroi").val(null);
                    }
                    sumar2();       
                });
        
         //MODAL CLIENTES CHECK  
                $(".btn-check").on("click", function(){    
                    var cliente = $(this).val();
                    var infocliente =  cliente.split("*");
                    $("#txtidcliente").val(infocliente[0]);
                    $("#txtcliente").val(infocliente[1]); 
                    $("#modal-default").modal("hide");       
                });
        
         //MODAL PROVEEDORES CHECK  
                $(".btn-checki").on("click", function(){    
                    var cliente = $(this).val();
                    var infocliente =  cliente.split("*");
                    $("#txtidcliente").val(infocliente[0]);
                    $("#txtcliente").val(infocliente[1]); 
                    $("#modal-default").modal("hide");       
                });
         //MODAL PRODUCTOS CHECK VENTA
                //var i =0;
                $(".btn-checkvp").on("click", function(){ 
                    this.disabled = true;                   
                    var produc = $(this).val();          
                    //i=i+1;   
                    //alert(produc)  ;        
                       var infoproduc =  produc.split("*");           
                        tabladetall = "<tr style='background-color: #FFF;'>";
                        tabladetall += "<td><input type='hidden' name='txtidproductos[]' id=txtidproductos value='"+infoproduc[0]+"'>"+ infoproduc[1] +"</td>";
                        tabladetall += "<td>"+ infoproduc[2] +"</td>";
                        tabladetall +=" <td><a   href=' "+ base_url+"uploads/imagenes/" + infoproduc[5] +"'  data-lightbox='example-set'><img  src=' "+ base_url+"uploads/imagenes/" + infoproduc[5] +"' class='img-thumbnail' alt='Cinque Terre' width='50px'      height='50px'></a></td>";
                        tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproduc[8] +"<br>";//CODMEDIDA
                        tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproduc[9] +"</td>";//NOMBRE  
                        tabladetall += "<td><input type='hidden' name='txtprecios[]' id=txtprecios value='"+infoproduc[3]+"'>"+ infoproduc[3] +"</td>";
                        tabladetall += "<td>"+ infoproduc[4] +"</td>";
                        tabladetall += "<td><input style='min-width: 70px; width: 74px;' type='number' id='txtcantidades' name='txtcantidades[]' class='cantidades' value='1'></td>";
                        tabladetall += "<td><input type='hidden' name='txtimportes[]' id=txtimportes value='"+infoproduc[3]+"'><p>"+ infoproduc[3] +"</p></td>";
                        tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
                        tabladetall += "</tr>";
                       $("#tbventas tbody").append(tabladetall);
                       sumar();   
        
                });
                //VALIDADR STOCK
                $(document).on("keyup","#tbventas input#txtcantidades",function(){ 
                    var cantidad = $(this).val();
                    var stock = $(this).closest("tr").find("td:eq(5)").text();

                    if (parseFloat(cantidad) > parseFloat(stock)) {
                        var cantidad = $(this).val("");
                        swal({
                          title: "La cantidad supera el Stock",
                          text: "Solo hay " + stock + " Unidades!",
                          type: "error",
                          button: "Aww yiss!",
                        });                       
                     }                           
                });
        

         //MODAL PRODUCTOS CHECK  INGRESO
                //var i =0;
                $(".btn-checkip").on("click", function(){    
                    var produc = $(this).val();          
                    //i=i+1;   
                    //alert(produc)  ;        
                       var infoproduc =  produc.split("*");           
                       tabladetall = "<tr style='background-color: #FFF;'>";
                      // tabladetall += "<td>"+ i +"</td>";//NOMBRE
                       tabladetall += "<td><input type='hidden' name='txtidproductosi[]' id=txtidproductosi value='"+infoproduc[0]+"'>"+ infoproduc[1] +"</td>";//ID CODIGO
                       tabladetall += "<td>"+ infoproduc[2] +"</td>";//NOMBRE
                       tabladetall +=" <td><a   href=' "+ base_url+"uploads/imagenes/" + infoproduc[5] +"'  data-lightbox='example-set'><img  src=' "+ base_url+"uploads/imagenes/" + infoproduc[5] +"' class='img-thumbnail' alt='Cinque Terre' width='50px'       height='50px'></a></td>";   
                       tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproduc[6] +"<br>";//CODMEDIDA
                       tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproduc[7] +"</td>";//NOMBRE
                       tabladetall += "<td>"+ infoproduc[4] +"</td>";//STOCK
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01' id='txtcantidadi' name='txtcantidadi[]' class='cantidadesi input' value='1'></td>";
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01'  id='txtpreciosc' name='txtpreciosc[]' class='preciosci input' value='"+infoproduc[3]+"'></td>";
                       tabladetall += "<td><input type='hidden' name='txtimportesi[]' id=txtimportesi value='"+infoproduc[3]+"'><p>"+ infoproduc[3] +"</p></td>";
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01'  id='txtpreciosv' name='txtpreciosv[]' class='preventai total' value='"+infoproduc[3]+"'></td>";
                       tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproduc[8] +"<br>";//CODMEDIDA
                       tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproduc[9] +"</td>";//NOMBRE   
                       tabladetall += "<td>"+ infoproduc[10] +"</td>";//STOCK  
                       tabladetall += "<td><input type='hidden' name='txtstocki[]' id=txtstocki value='"+infoproduc[10]+"'><p>"+ infoproduc[10] +"</p></td>";              
                       tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
                       tabladetall += "</tr>";
                       $("#tbventasi tbody").append(tabladetall);
                       sumar2();   
        
                });
        //-----------------------------------------------------------------------
                //AUTOCOMPLETAR  VENTA
                $("#txtproducto").autocomplete({
                    source : function(request ,response){
                        $.ajax({
                            url: base_url + "movimientos/cventa/cgetproductos",
                            type: "POST",
                            dataType: "json",                    
                            data: { valor: request.term },
                            success:function(data){
                                ///alert('data');
                                response(data);
                            }
                        });
                    },
                 
                    minLength : 1,//cuantos caracteres se active el pluyin
                    select: function(event, ui){                
                        data = ui.item.idproducto + "*"+ ui.item.codigo + "*"+ ui.item.label + "*"+ ui.item.precio + "*"+ ui.item.stockventa +"*" +ui.item.imagen +"*"+ ui.item.codunidadmedidas +"*"+ ui.item.unidadmedidas +"*"+ ui.item.codestino +"*"+ ui.item.nomdestino +"*"+ ui.item.nfactorconversion;
                        $("#btn-agregar").val(data);
                    }
                });
        
                //AUTOCOMPLETAR  INGRESO
                $("#txtproductoi").autocomplete({
                    source : function(request ,response){
                        $.ajax({
                            url: base_url + "movimientos/cingreso/cgetproductos",
                            type: "POST",
                            dataType: "json",                    
                            data: { valor: request.term },
                            success:function(data){
                                ///alert('data');
                                response(data);
                            }
                        });
                    },
        
                    minLength : 1,//cuantos caracteres se active el pluyin
                    select: function(event, ui){                
                        data = ui.item.idproducto + "*"+ ui.item.codigo + "*"+ ui.item.label + "*"+ ui.item.precio + "*"+ ui.item.stock + "*"+ ui.item.imagen+ "*"+ ui.item.codunidadmedidas+ "*"+ ui.item.unidadmedidas+ "*"+ ui.item.codestino + "*"+ ui.item.nomdestino + "*"+ ui.item.nfactorconversion  ;
                        $("#btn-agregari").val(data);
                    }
                });
                //------------------------------------------------------------------
                //DETALLE TABLA VENTA
                $("#btn-agregar").on("click",function(){                     
                    var data = $(this).val();
                    if (data !='') {
                        var infoproducto =  data.split("*");
                        tabladetall = "<tr style='background-color: #FFF;'>";
                        tabladetall += "<td><input type='hidden' name='txtidproductos[]' id=txtidproductos value='"+infoproducto[0]+"'>"+ infoproducto[1] +"</td>";
                        tabladetall += "<td>"+ infoproducto[2] +"</td>";
                        tabladetall +=" <td><a   href=' "+ base_url+"uploads/imagenes/" + infoproducto[5] +"'  data-lightbox='example-set'><img  src=' "+ base_url+"uploads/imagenes/" + infoproducto[5] +"' class='img-thumbnail' alt='Cinque Terre' width='50px'      height='50px'></a></td>";
                        tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproducto[8] +"<br>";//CODMEDIDA
                        tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproducto[9] +"</td>";//NOMBRE  
                        tabladetall += "<td><input type='hidden' name='txtprecios[]' id=txtprecios value='"+infoproducto[3]+"'>"+ infoproducto[3] +"</td>";
                        tabladetall += "<td>"+ infoproducto[4] +"</td>";
                        tabladetall += "<td><input style='min-width: 70px; width: 74px;' type='number' id='txtcantidades' name='txtcantidades[]' class='cantidades' value='1'></td>";
                        tabladetall += "<td><input type='hidden' name='txtimportes[]' id=txtimportes value='"+infoproducto[3]+"'><p>"+ infoproducto[3] +"</p></td>";
                        tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
                        tabladetall += "</tr>";

                       $("#tbventas tbody").append(tabladetall);
                        sumar();
                        $("#btn-agregar").val(null);
                        $("#txtproducto").val(null);
                    }else{
                        alert("Seleccione un Producto")
                    }
                });



            //DETALLE VENTA   EDITAR 
            $(document).on("click",".btn-view-detedit",function(){    
               valor_id = $(this).val();        
                $.ajax({
                    url: base_url + "movimientos/cventa/cviewedit",
                    type: "POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        
                        $("#modal-defaultedit .modal-body").html(data);
                       // alert(data);alert(res);
                    }
            
                });
            });




















                //DETALLE TABLA INGRESO
                $("#btn-agregari").on("click",function(){                     
                    var data = $(this).val();            
                    if (data !='') {
                        var infoproducto =  data.split("*");
                        tabladetall = "<tr style='background-color: #FFF;'>";             
                       tabladetall += "<td><input type='hidden' name='txtidproductosi[]' id=txtidproductosi value='"+infoproducto[0]+"'>"+ infoproducto[1] +"</td>";//ID CODIGO
                       tabladetall += "<td>"+ infoproducto[2] +"</td>";//NOMBRE
                       tabladetall +=" <td><a   href=' "+ base_url+"uploads/imagenes/" + infoproducto[5] +"'  data-lightbox='example-set'><img  src=' "+ base_url+"uploads/imagenes/" + infoproducto[5] +"' class='img-thumbnail' alt='Cinque Terre' width='50px'       height='50px'></a></td>";   
                       tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproducto[6] +"<br>";//CODMEDIDA
                       tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproducto[7] +"</td>";//NOMBRE
                       tabladetall += "<td>"+ infoproducto[4] +"</td>";//STOCK
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01' id='txtcantidadi' name='txtcantidadi[]' class='cantidadesi input' value='1'></td>";
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01'  id='txtpreciosc' name='txtpreciosc[]' class='preciosci input' value='"+infoproducto[3]+"'></td>";
                       tabladetall += "<td><input type='hidden' name='txtimportesi[]' id=txtimportesi value='"+infoproducto[3]+"'><p>"+ infoproducto[3] +"</p></td>";
                       tabladetall += "<td ><input style='min-width: 70px; width: 74px;' type='number' step='0.01'  id='txtpreciosv' name='txtpreciosv[]' class='preventai total' value='"+infoproducto[3]+"'></td>";
                       tabladetall += "<td><i class='fa fa-fw fa-qrcode'></i> "+ infoproducto[8] +"<br>";//CODMEDIDA
                       tabladetall += "<i class='fa fa-fw fa-balance-scale'></i> "+ infoproducto[9] +"</td>";//NOMBRE   
                       tabladetall += "<td>"+ infoproducto[10] +"</td>";//STOCK  
                       tabladetall += "<td><input type='hidden' name='txtstocki[]' id=txtstocki value='"+infoproducto[10]+"'><p>"+ infoproducto[10] +"</p></td>";              
                       tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
                       tabladetall += "</tr>";
                       $("#tbventasi tbody").append(tabladetall);
                        sumar2();       
                        $("#btn-agregari").val(null);
                        $("#txtproductoi").val(null);
                    }else{
                        alert("Seleccione un Producto") 
                    }
                });
                //-----------------------------------------------------------
                //ELIMINAR COLUMNA TABLA
                $(document).on("click",".btn-remove-producto",function(){   
                    // var codigo = $(this).closest("tr").find("td:eq(0)").text();                   
                    
                     $('.btn-checkvp').attr("disabled", false);

                     $(this).closest("tr").remove();
                     sumar();
                });
                //SUMAR
                $(document).on("keyup","#tbventas input.cantidades",function(){          
                     var cantidad = $(this).val();
                     var precio = $(this).closest("tr").find("td:eq(4)").text();
                     var importe = cantidad * precio;
        
                     $(this).closest("tr").find("td:eq(7)").children("p").text(importe);
                     $(this).closest("tr").find("td:eq(7)").children("input").val(importe);
                    sumar();
                });
        
                 ////------------------COMPRAS-------------------------------------------------
                //MULTIPLICAR CONVERSION
                $(document).on("keyup","#tbventasi input.cantidadesi",function(){          
                    var cantidadi = $(this).val();                                 
                    var precioi = $(this).closest("tr").find("td:eq(10)").text();
                    var importei = cantidadi * precioi;
                    $(this).closest("tr").find("td:eq(11)").children("p").text(importei);
                    $(this).closest("tr").find("td:eq(11)").children("input").val(importei);
                });
                ////MULTIPLICAR PRECIO COMPRA
                $(document).on("keyup","input.preciosci,input.cantidadesi",function(){ 
                    var tr=this.closest("tr"); 
                    var total=1;
                    // recorremos todos los elementos del tr que tienen la clase .input
                    var inputs=tr.querySelectorAll(".input");
                    inputs.forEach(function(e) {
                        total*=e.value;
                    });        
                   // mostramos el total con dos decimales
                 //  tr.querySelector(".total").value=total.toFixed(2);
                    $(this).closest("tr").find("td:eq(7)").children("p").text(total.toFixed(2));
                    $(this).closest("tr").find("td:eq(7)").children("input").val(total.toFixed(2));
                    sumar2();   
                });
            
        
        
               
        
               
                    
        //--------------------------------------------------------------------------------------
                
        
        
                   //DETALLE VENTA    
            $(document).on("click",".btn-view-venta",function(){    
               valor_id = $(this).val();        
                $.ajax({
                    url: base_url + "movimientos/cventa/cview",
                    type: "POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        
                        $("#modal-default .modal-body").html(data);
                       // alert(data);alert(res);
                    }
            
                });
            });
        
                  //DETALLE INGRESO    
            $(document).on("click",".btn-view-ingreso",function(){    
               valor_id = $(this).val();        
                $.ajax({
                    url: base_url + "movimientos/cingreso/cview",
                    type: "POST",
                    dataType:"html",
                    data:{id:valor_id},
                    success:function(data){
                        
                        $("#modal-default .modal-body").html(data);
                       // alert(data);alert(res);
                    }
            
                });
            });
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
        
        function generarnumero(numero){
            if (numero >= 99999 && numero < 999999) {
                return Number(numero)+1;
            }
            if (numero >= 9999 && numero < 99999) {
                return "0" + (Number(numero)+1);
            }
            if (numero >= 999 && numero < 9999) {
                return "00" + (Number(numero)+1);
            }
            if (numero >= 99 && numero < 999) {
                return "000" + (Number(numero)+1);
            }
            if (numero >= 9 && numero < 99) {
                return "0000" + (Number(numero)+1);
            }
            if (numero < 9 ) {
                return "00000" + (Number(numero)+1);
            }
        };
        
        function sumar(){
            subtotal = 0;
            $("#tbventas tbody tr").each(function(){   
             subtotal = subtotal +  Number($(this).find("td:eq(7)").text());
            });
          
            $("input[name=txtsubtotal]").val(subtotal);
            porcentaje =$("#txtigv").val();
            igv = subtotal * (porcentaje/100);
            $("input[name=txttotaligv]").val(igv.toFixed(2));
            descuento =  $("input[name=txtdescuento]").val();
            total =subtotal + igv - descuento;
            $("input[name=txttotal]").val(total);
            $('#txttotali').text("S/. " + total);
            
        }
        
        function sumar2(){
            subtotal = 0;
            $("#tbventasi tbody tr").each(function(){   
             subtotal = subtotal +  Number($(this).find("td:eq(7)").text());
            });
            $("input[name=txtsubtotali]").val(subtotal);
            porcentaje =$("#txtigvi").val();
            igv = subtotal * (porcentaje/100);
            $("input[name=txttotaligvi]").val(igv.toFixed(2));
            descuento =  $("input[name=txtdescuentoi]").val();
            total =subtotal + igv - descuento;
            $("input[name=txttotali]").val(total);
            $('#txttotali').text("S/. " + total);
            
        }
        
        
        
       //----------------------------------------------------------
       //--------------------------------GRAFICCOS----------------- 
        
        function  datagrafico (base_url,year){
            namesMonth =["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
              $.ajax({
                    url: base_url + "cdashboard/getdata",
                    type: "POST",
                    data:{year:year},
                    dataType:"json",                   
                    success:function(data){
                        var meses = new Array();
                        var montos = new Array();
                        
                       $.each(data,function(key,value){
                        meses.push(namesMonth[value.mes - 1]);
                        valor = Number(value.monto);
                        montos.push(valor);
                       }) ;
                       graficar(meses,montos,year);
                    }
                });
        }
        
        
        
        
        
        function graficar (meses,montos,year) {
            $('#grafico').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monto acumulado por las ventas de los meses'
                },
                subtitle: {
                    text: 'Año ' + year
                },
                xAxis: {
                    categories: meses,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Monto Acumulado (Soles)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
                        '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },series:{
                        dataLabels:{
                            enabled:true,
                            formatter:function(){
                                return Highcharts.numberFormat(this.y,2)
                            }
                        }
                    }
                },
                series: [{
                    name: 'Meses',
                    data: montos,
                    color: '#00a65a'
        
                }]
            });
        };

        function  datagraficoi (base_url,year){
            namesMonth =["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
              $.ajax({
                    url: base_url + "cdashboard/getdatai",
                    type: "POST",
                    data:{year:year},
                    dataType:"json",                   
                    success:function(data){
                        var meses = new Array();
                        var montos = new Array();
                        
                       $.each(data,function(key,value){
                        meses.push(namesMonth[value.mes - 1]);
                        valor = Number(value.monto);
                        montos.push(valor);
                       }) ;
                       graficari(meses,montos,year);
                    }
                });
        }

        function graficari (meses,montos,year) {
            $('#graficoi').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monto acumulado por los ingresos de los meses'
                },
                subtitle: {
                    text: 'Año ' + year
                },
                xAxis: {
                    categories: meses,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Monto Acumulado (Soles)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
                        '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },series:{
                        dataLabels:{
                            enabled:true,
                            formatter:function(){
                                return Highcharts.numberFormat(this.y,2)
                            }
                        }
                    }
                },
                series: [{
                    name: 'Meses',
                    data: montos,
                    color: '#005384'
        
                }]
            });
        };



     
        function  datagraficotop (base_url){            
              $.ajax({
                    url: base_url + "cdashboard/getdatatop",
                    type: "POST",                    
                    dataType:"json",                   
                    success:function(Result){                         
                        var data = [];
                        for (var i in Result) {                           
                            var serie = new Array(Result[i].nombre, Number(Result[i].contar));                          
                            data.push(serie);
                        }   
                       graficartop(data);
                    }
                });
        }
               function graficartop (series) {
           
                $('#graficotop').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Productos más vendido (TOP 5)'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Producto',
                        data:  series
                        
                    }]
                });
           
        };

        function  datagraficovdia (base_url,year){            
              $.ajax({
                    url: base_url + "cdashboard/getdatavdia",
                    type: "POST",                    
                    dataType:"json",                   
                    success:function(data){

                        var nombre = new Array();
                        var cantidad = new Array();                        
                       $.each(data,function(key,value){
                        nombre.push(value.hoy );
                        valor = Number(value.total_venta);
                         cantidad.push(valor);                        
                       }) ;                        
                       graficarvdia(nombre,cantidad, year);
                    }
                });
        }

        function graficarvdia (nombre,cantidad,year) {

           $('#graficovdia').highcharts({
               chart: {
                   type: 'column'
               },
               title: {
                   text: 'Total de Ventas del día'
               },
               subtitle: {
                   text: 'Año ' + year
               },
               xAxis: {
                   categories: nombre,
                   crosshair: true
               },
               yAxis: {
                   min: 0,
                   title: {
                       text: 'Monto Acumulado (Soles)'
                   }
               },
               tooltip: {
                   headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                   pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
                       '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
                   footerFormat: '</table>',
                   shared: true,
                   useHTML: true
               },
               plotOptions: {
                   column: {
                       pointPadding: 0.2,
                       borderWidth: 0
                   },series:{
                       dataLabels:{
                           enabled:true,
                           formatter:function(){
                               return Highcharts.numberFormat(this.y,2)
                           }
                       }
                   }
               },
               series: [{
                   name: 'Productos',
                   data: cantidad,
                   color: '#00a65a'
        
               }]
           });
          };


          function  datagraficoanos (base_url,year){            
              $.ajax({
                    url: base_url + "cdashboard/getdatavanos",
                    type: "POST",                    
                    dataType:"json",                   
                    success:function(data){

                        var nombre = new Array();
                        var cantidad = new Array();                        
                       $.each(data,function(key,value){
                        nombre.push(value.ano );
                        valor = Number(value.totalxa);
                         cantidad.push(valor);                        
                       }) ;                        
                       graficaranos(nombre,cantidad, year);
                    }
                });
        }

        function graficaranos (nombre,cantidad,year) {

            $('#graficoanos').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Total de Ventas Anuales'
        },
        subtitle: {
            text: 'Año Actual : ' + year
        },
        xAxis: {
            categories: nombre
        },
        yAxis: {
            title: {
                text: 'Monto Acumulado (Soles)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Año',
            data: cantidad
        }]
    });
          };

     


        //FIN DE GRAFICO

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

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
//--------------------------VENTA RAPIDA----------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
//COMBO COMPROBANTE  VENTA RAPI
                //
        
               


                $("#txtcomprobantesrap").on("change", function(){    
                 var option = $(this).val();                     
                    if (option !="") {
                         var infocomprobante =  option.split("*");                                       
                        $("#txtidcomprobanterap").val(infocomprobante[0]);
                        $("#txtigvrap").val(infocomprobante[2]);
                        $("#txtserierap").val(infocomprobante[3]);
                        $("#txtnumerorap").val(generarnumero(infocomprobante[1]));  
                    }else{
                        $("#txtidcomprobanterap").val(null);
                        $("#txtigvrap").val(null);
                        $("#txtserierap").val(null);
                        $("#txtnumerorap").val(null);
                    }
                    sumarvrap();       
                });
                 //SUMAR TEXT PRECIO
                $(document).on("keyup","#posTable input.cantidades",function(){ 
                        
                     var cantidad = $(this).val();
                     var precio = $(this).closest("tr").find("td:eq(2)").text();
                     var importe = cantidad * precio;
        
                     $(this).closest("tr").find("td:eq(4)").children("p").text(importe.toFixed(2));                    
                     $(this).closest("tr").find("td:eq(4)").children("input").val(importe.toFixed(2));
                    sumarvrap();
                });
                 $(document).on("click",".btn-remove-productovrap",function(){   
                    // var codigo = $(this).closest("tr").find("td:eq(0)").text();                   
                    
                     $('.btn-checkvp').attr("disabled", false);

                     $(this).closest("tr").remove();
                     sumarvrap();
                });

    //DETALLE TABLA VENTA RAPIDA
        //COMBO COMPROBANTE  INGRESO
                $("#txtadproducto").on("change", function(){    
                 var option = $(this).val();  
                 $("#btn-agregarrap").val(option);        
                    //if (option !="") {
                    //     var infoproduc =  option.split("*");
                    //   tabladetall = "<tr style='background-color: #FFF;'>";
                    //   tabladetall += "<td><input type='hidden' name='txtidproductosrap[]' id=txtidproductosrap value='"+infoproduc[0]+"'><button type='button' class='btn btn-block btn-xs edit btn-warning' style='white-space: normal; text-align: left !important;'><span class='sname' >"+ infoproduc[2] +"</span></button></td>";                       
                    //   tabladetall += "<td>"+ infoproduc[4] +"</td>";
                    //   tabladetall += "<td><input type='hidden' name='txtprecios[]' id=txtprecios value='"+infoproduc[3]+"'>"+ infoproduc[3] +"</td>";                       
                    //   tabladetall += "<td><input style='min-width: 70px; width: 74px;' type='number' id='txtcantidades' name='txtcantidades[]' class='cantidades' value='1'></td>";
                    //   tabladetall += "<td><input type='hidden' name='txtimportes[]' id=txtimportes value='"+infoproduc[3]+"'><p>"+ infoproduc[3] +"</p></td>";
                    //   tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
                    //   tabladetall += "</tr>";
                    //   $("#posTable tbody").append(tabladetall);
                    //}else{
                    //    //$("#txtidcomprobantei").val(null);
                    //    
                    //}
                         
                });

                $("#btn-agregarrap").on("click",function(){                     
                    var data = $(this).val();              
                    if (data !='') {                                              
                      var infoproduc =  data.split("*");                        
                       var nombre=  infoproduc[2];
                       // if (nombre.length >= 20) {
                       // nombre = nombre.substr(0, 20) + " ..."; 
                       //}else{
                       // nombre;
                       //}  
                             
                       tabladetall = "<tr >";
                       tabladetall += "<td><input type='hidden' name='txtidproductosrap[]' id=txtidproductosrap value='"+infoproduc[0]+"'><button type='button' class='btn btn-block btn-xs edit btn-warning' style='white-space: normal; text-align: left !important;' data-toggle='tooltip' title='"+ infoproduc[2] +"'><span class='sname' >"+ nombre +"</span></button></td>";                       
                       tabladetall += "<td>"+ infoproduc[4] +"</td>";
                       tabladetall += "<td><input type='hidden' name='txtprecios[]' id=txtprecios value='"+infoproduc[3]+"'>"+ infoproduc[3] +"</td>";                       
                       tabladetall += "<td><input style='min-width: 70px; width: 74px;' type='number' id='txtcantidades' name='txtcantidades[]' class='cantidades' value='1'></td>";
                       tabladetall += "<td><input type='hidden' name='txtimportes[]' id=txtimportes value='"+infoproduc[3]+"'><p>"+ infoproduc[3] +"</p></td>";
                       tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-productovrap'><span class='fa fa-remove'></span></button></td>";
                       tabladetall += "</tr>";
                       $("#posTable tbody").append(tabladetall);
                       sumarvrap();
                    }else{
                        alert("Seleccione un Producto")
                    }
                });

          //MODAL PRODUCTOS CHECK VENTA RAPIDA 
                
                 $(document).on("click",".datosvenra", function(){                                                 
                    var produc = $(this).val();                        
                    var infoproduc =  produc.split("*");                       
                       var nombre=  infoproduc[2];
                       //if (nombre.length >= 20) {
                       // nombre = nombre.substr(0, 20) + " ..."; 
                       //}else{
                       // nombre;
                       //}                  
                          
                       tabladetall = "<tr >";
                       tabladetall += "<td><input type='hidden' name='txtidproductosrap[]' id=txtidproductosrap value='"+infoproduc[0]+"'><button type='button' class='btn btn-block btn-xs edit btn-warning' style='white-space: normal; text-align: left !important;' data-toggle='tooltip' title='"+ infoproduc[2] +"'><span class='sname' >"+ nombre +"</span></button></td>";                       
                       tabladetall += "<td>"+ infoproduc[4] +"</td>";
                       tabladetall += "<td><input type='hidden' name='txtprecios[]' id=txtprecios value='"+infoproduc[3]+"'>"+ infoproduc[3] +"</td>";                       
                       tabladetall += "<td><input style='min-width: 70px; width: 74px;' type='number' id='txtcantidades' name='txtcantidades[]' class='cantidades' value='1'></td>";
                       tabladetall += "<td><input type='hidden' name='txtimportes[]' id=txtimportes value='"+infoproduc[3]+"'><p>"+ infoproduc[3] +"</p></td>";
                       tabladetall += "<td><button type='button' class='btn btn-danger btn-remove-productovrap'><span class='fa fa-remove'></span></button></td>";
                       tabladetall += "</tr>";
                       $("#posTable tbody").append(tabladetall);
                       sumarvrap();
        
                });
                       //VALIDADR STOCK
                $(document).on("keyup","#posTable input#txtcantidades",function(){ 
                    var cantidad = $(this).val();
                    var stock = $(this).closest("tr").find("td:eq(1)").text();                   
                    if (parseFloat(cantidad) > parseFloat(stock)) {
                        var cantidad = $(this).val("");
                        swal({
                          title: "La cantidad supera el Stock",
                          text: "Solo hay " + stock + " Unidades!",
                          type: "error",
                          button: "Aww yiss!",
                        });                       
                     }                           
                });
         function sumarvrap(){
            subtotal = 0;
            $("#posTable tbody tr").each(function(){   
             subtotal = subtotal +  Number($(this).find("td:eq(4)").text());
             //alert(subtotal);
            });
            $("input[name=txtsubtotalrap]").val(subtotal);
            porcentaje =$("#txtigvrap").val();

            igv = subtotal * (porcentaje/100);

            $("input[name=txttotaligvrap]").val(igv.toFixed(2));
            descuento =  $("input[name=txtdescuentorap]").val();
            total =subtotal + igv - descuento;
            $("input[name=txttotalrap]").val(total);
            //$('#txttotali').text("S/. " + total);
            
        }
   


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
