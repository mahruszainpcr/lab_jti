<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Starter page | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
       <?php $this->load->view('templates/css'); ?>
    </head>

    <body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-right">

                           

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="<?php echo $this->session->userdata('picture'); ?>" alt="Header Avatar">
									<span class="d-none d-sm-inline-block ml-1"><?php 
									echo $this->session->userdata('name').", ".$this->session->userdata('status');?></span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                                </div>
                            </div>
                        </div>

                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url(); ?>index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>/assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>/assets/images/logo-dark.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="<?php echo base_url(); ?>index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>/assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>/assets/images/logo-light.png" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('home'); ?>">
                                                Dashboard
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('peminjaman_lab'); ?>">
                                                Peminjaman Laboratorium
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

    
            </header>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                   <!-- Page-Title -->
 <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Halaman <?php echo str_replace("_"," ", $this->uri->segment(1)); ?></h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1));?>"><?php echo str_replace("_"," ", $this->uri->segment(1)); ?></a></li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                     