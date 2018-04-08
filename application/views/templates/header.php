<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul; ?></title>

	

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

     <!-- DataTables CSS -->
    <!-- <link href="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> -->
	 <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- DatePicker CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap-select -->
	<link href="<?php echo base_url(); ?>assets/dist/css/bootstrap-select.css" rel="stylesheet">
	
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 	 
     
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>home/index">SIPD</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->                                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                                              
                        <li><a href="<?php echo base_url(); ?>home/profil"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                       
                        <li>
                            <a href="<?php echo base_url(); ?>home/index"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
                        </li>                         
                         <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Daftar Perjalanan Dinas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>home/index"> Terencana</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>home/perjalanan_selesai_batal"> Selesai dan Dibatalkan</a>
                                </li>
                            </ul>                            
                        </li>                                          
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Data Pegawai<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>data_pegawai_controller/index"> Daftar Pegawai</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>pangkat_controller"> Pengaturan Pangkat</a>
                                </li>
                            </ul>                            
                        </li>                          
                       <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i> Pengaturan Tujuan Dinas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>daftar_prov_controller/index"> Daftar Provinsi</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>daftar_kota_controller/index"> Daftar Kota</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>daftar_kec_controller/index"> Daftar Kecamatan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>status_lokasi_controller/index"> Pengaturan Status Lokasi</a>
                                </li>
                            </ul>                            
                        </li>
                         <li>
                            <a href="<?php echo base_url(); ?>alat_angkut_controller/index"><i class="fa fa-plane fa-fw"></i> Daftar Alat Angkut</a>
                        </li>                                            
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>