<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trading | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/custom-style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/dist/css/bootstrap-datepicker.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->
    <li class="dropdown user user-menu open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <img src="<?php echo base_url();?>/assets/theme/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander</span>
            </a>
            <ul class="dropdown-menu">              
              <li class="user-header">
                <img src="<?php echo base_url();?>/assets/theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Alexander - Web Developer
                  <small>Member since Nov. 2019</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url();?>admin/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
  </ul>
  <!-- SEARCH FORM -->
  <!-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form> -->

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url(); ?>/assets/theme/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Trading</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>/assets/theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview menu-open">
          <a href="<?=base_url();?>admin/dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard             
            </p>
          </a>         
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url();?>admin/users" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Listing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url();?>admin/users-subscription" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Subscription</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User's Stock Wishlist</p>
              </a>
            </li>  
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Stock Management
              <i class="right fas fa-angle-left" ></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url();?>stock/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock Listing</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url();?>stock/add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Stock Info.</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url();?>stock/stock-history" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View History</p>
              </a>
            </li>             
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Plan Management
              <i class="right fas fa-angle-left" ></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?=base_url();?>plan/add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Plan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url();?>plan/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Plans</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-plus-square"></i>
            <p>
              Predictions
              <i class="right fas fa-angle-left" ></i>
            </p>
          </a>
          <ul class="nav nav-treeview">            
            <li class="nav-item">
              <a href="<?=base_url();?>notification/add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Notification</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url();?>notification/view" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Notifications</p>
              </a>
            </li>                        
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>