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
                    <li class="<?=$_SESSION['menus'] =='dashboard' ? 'active': '' ?>">
                        <a href="<?php echo base_url();?>Dashboard" >
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="treeview <?=$_SESSION['menus'] =='categoria' || $_SESSION['menus'] =='modelo' || $_SESSION['menus'] =='producto' || $_SESSION['menus'] =='marca' ? 'active': '' ?>">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu " >
                            <li class="<?=$_SESSION['menus'] =='categoria' ? 'active': '' ?>"><a href="<?php echo base_url();?>maintenance/Ccategory" ><i class="fa fa-circle-o"></i> Categoria</a></li>
                            <li class="<?=$_SESSION['menus'] =='marca' ? 'active': '' ?>"><a href="<?php echo base_url();?>maintenance/Cbrand"><i class="fa fa-circle-o"></i> Marca</a></li>
                            <li class="<?=$_SESSION['menus'] =='modelo' ? 'active': '' ?>"><a href="<?php echo base_url();?>maintenance/Cmodel"><i class="fa fa-circle-o"></i> Modelo</a></li>
                            <li class="<?=$_SESSION['menus'] =='producto' ? 'active': '' ?>"><a href="<?php echo base_url();?>maintenance/Cproduct"><i class="fa fa-circle-o"></i> Producto</a></li>
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