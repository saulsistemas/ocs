        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" style="background: #ffffff;    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">  
                <div class="user-panel">
                 <div class="pull-left image">
                  <img src="<?php echo base_url()?>assets/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                 </div>
                    <div class="pull-left info" style="color: black;">
                        <p><?php echo $this->session->userdata('nombres') ?></p>
                        <a href="<?php echo base_url();?>cauth/clogout" style="color: black;"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>    
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                   <!--  <li class="header">MAIN NAVIGATION</li> -->
                    <li >
                        <a href="<?php echo base_url();?>cdashboard" >
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li >
                         <a href="<?php echo base_url();?>movimientos/cventarap"><i class="fa fa fa-th"></i><span> VTR </span></a>
                        
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/cmaterial"><i class="fa fa-circle-o"></i> Tipo Material</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/ccolor"><i class="fa fa-circle-o"></i> Color</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/cmarca"><i class="fa fa-circle-o"></i> Marca</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/ccategoria"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/cfactorconve"><i class="fa fa-circle-o"></i> Factor Conversión</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/ccliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/cproveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/cproducto"><i class="fa fa-circle-o"></i> Productos</a></li>
                        </ul>
                    </li>
                    
                    <li>
                       
                        <a href="<?php echo base_url();?>movimientos/cingreso"><i class="fa fa-truck"></i><span> Compra <small class="label pull-right " style="background-color: #005384; color: #FFF;">C</small></span></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url();?>movimientos/cventa"><i class="fa fa-shopping-cart"></i><span> Venta <small class="label pull-right bg-green">V</small></span></a>
                    </li>

                   
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/crventa"><i class="fa fa-circle-o"></i> Ventas</a></li>
                        
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Tipo Documentos</a></li>
                            <li><a href="<?php echo base_url();?>administrador/cusuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>administrador/cpermiso"><i class="fa fa-circle-o"></i> Permisos</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->