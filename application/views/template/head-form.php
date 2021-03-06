<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Praktikum SIG</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/adm/') ?>plugins/summernote/summernote-bs4.min.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('assets/adm/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI SPBU</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-geo-alt"></i>
                <p>
                  Marker
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Tamp/form') ?>" class="nav-link active">
                    <i class="far bi bi-chevron-right"></i>
                    <p>Form</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Tamp/data_spbu') ?>" class="nav-link">
                    <i class="far bi bi-chevron-right"></i>
                    <p>Data Marker</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-signpost-split"></i>
                <p>
                  Line
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Tamp/formLine') ?>" class="nav-link">
                    <i class="far bi bi-chevron-right"></i>
                    <p>Form</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Tamp/dataLine') ?>" class="nav-link">
                    <i class="far bi bi-chevron-right"></i>
                    <p>Data Jalan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                  <a href="<?= base_url('Tamp/index') ?>" class="nav-link">
                    <i class="far bi bi-map"></i>
                    <p>Map</p>
                  </a>
                </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>