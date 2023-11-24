<?php
$base_url = 'http://localhost/Monografia/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiCI Chongoene</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $base_url ?>assets/plugins/summernote/summernote-bs4.min.css">

  <style>
    /* Estilo para pintar em azul claro */
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link:hover {
      background-color: #00BFFF;
    }

    /* Estilo para os ícones no menu */
    .sidebar-dark-primary .nav-icon {
      color: #00BFFF;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo $base_url ?>assets/img/Emblem.PNG" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo $base_url ?>assets/img/logochongo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SiCI Chongoene</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $base_url ?>assets/img/download.JPG" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["username"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $base_url ?>principal.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Principal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url ?>usuario/verificar.php" class="nav-link">
              <i class="nav-icon fas  fa-user"></i>
              <p>Usuários</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url ?>contribuinte/verificar.php" class="nav-link">
              <i class="nav-icon fas  fa-user"></i>
              <p>Contribuintes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url ?>consulta_de_contri.php" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>Contribuições</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url ?>Contribuicoes.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Listas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url ?>Estatísticas/Grafico.php" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Estatísticas</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Restante do seu código -->
</div>
</body>
</html>
