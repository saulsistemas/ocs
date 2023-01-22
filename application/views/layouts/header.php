<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Ventas | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/select2/bootstrap-select.min.css">
   
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/alert/dist/sweetalert.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- DataTables Export-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
  <!-- demo style -->
  <style type="text/css">
    
       #pos {
       padding: 0px;
    }
       .contents {
            padding: 0px 0px 0px 0;
            position: relative;
            min-height: 440px;
            overflow: hidden;
        }
         #list-table-div {
            min-height: 160px;
        }
         .contents .product-nav {
            position: absolute;
            bottom: 0;
            padding-right: 65px;
        }
         .contents #item-list .btn {
            width: 120px;
            text-align: center;
        }
         .contents #item-list .items {
            height: 100%;
            position: relative;
            overflow: hidden;
        }
         .contents #item-list .btn-name {
            width: 116px;
            height: 60px;
            line-height: 16px;
            white-space: pre-wrap;
            margin: 2px;
        }
         .contents #item-list .btn-img,
         .contents #item-list .btn-both {
            background: transparent;
            padding: 3px;
        }
         .contents #item-list .btn-img:hover,
         .contents #item-list .btn-both:hover {
            background: #CCC;
        }
         .contents #item-list .btn-both .bg-img {
            background: #FFF;
            height: 110px;
            padding: 5px;
        }
         .contents #item-list .btn-both span {
            display: block;
            width: 110px;
            background: #E5E5E5;
            height: 40px;
            overflow: hidden;
            white-space: pre-wrap;
            margin-left: 1px;
        }
         .contents #item-list .btn-both span span {
            display: table-cell;
            vertical-align: middle;;
            overflow: hidden;
            white-space: pre-wrap;
            line-height: 16px;
            padding: 3px 2px;
        }
        .contents #item-list .btn-both .bg-img {
        background: #FFF;
        height: 110px;
        padding: 5px;
        }
         .print {
            display: none;
        }



  </style>


</head>
<body class="hold-transition  skin-blue sidebar-mini ">
<!-- <body class="hold-transition  skin-blue sidebar-mini sidebar-collapse"> -->
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url();?>Dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>V</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SOLGAS</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata('nombres') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="<?php echo base_url();?>Auth/logout "> Cerrar Sesión</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>