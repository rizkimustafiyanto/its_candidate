<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRIS</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />
  <!-- <link rel="icon" href="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" type="image/gif"> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="<?php echo base_url(); ?>assets/audio/tingtung.mp3"></audio>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- dropzonejs -->
  <script src="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
  <!-- AdminLTE for demo purposes -->

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/chartjs/chart.js"></script>

  <style type="text/css">
    .person {
      border: 1px solid;
      border-radius: 50%;
      width: 50px;
      height: 50px;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
      <!-- <nav class="main-header navbar navbar-expand navbar"> -->
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>logout" role="button">
            <i class="fa fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
    <aside class="main-sidebar sidebar-light-danger elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/dist/img/logo_psd.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">HRIS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php if ($this->session->userdata('photo_url') == null) { ?>
              <img src="<?php echo base_url(); ?>assets/dist/img/logo_psd.jpg" class="img-circle elevation-2" alt="User Image">
            <?php } else { ?>
              <img src="<?php echo base_url(); ?>../api-hris/upload/<?php echo $this->session->userdata('photo_url') ?>" class="person" alt="User Image">
            <?php } ?>
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $this->session->userdata('candidate_name'); ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            // data main menu
            $this->db->distinct();
            $this->db->select('c.menu_id, c.menu_name, c.menu_url, c.menu_icon, c.url_name');
            $this->db->from('gm_menu_role_candidate a');
            $this->db->join('gm_role_candidate b', 'a.role_id = b.role_id', 'left');
            $this->db->join('gm_menu_candidate c', 'a.menu_id = c.menu_id', 'left');
            $this->db->where('a.role_id', $this->session->userdata('role_id'));
            $main_menu = $this->db->get();

            foreach ($main_menu->result() as $main) {
              // Query untuk mencari data sub menu
              $this->db->select('c.sub_menu_id, c.sub_menu_name, c.sub_menu_url, c.sub_menu_icon, c.url_name');
              $this->db->from('gm_menu_role_candidate a');
              $this->db->join('gm_sub_menu_candidate c', 'a.sub_menu_id = c.sub_menu_id');
              $this->db->where('a.role_id', $this->session->userdata('role_id'));
              $this->db->where('a.menu_id', $main->menu_id);

              $this->db->order_by('c.sub_menu_name', 'asc');
              $sub_menu = $this->db->get();



              // periksa apakah ada sub menu
              if ($sub_menu->num_rows() > 0) {
                // main menu dengan sub menu

                echo "<li class='nav-item'><a class='nav-link' href='" . $main->menu_url . "'><i class='" . $main->menu_icon . "'></i><p>" . $main->menu_name . "<i class='right fas fa-angle-left'></i></p></a>";


                // sub menu nya disini
                echo "<ul class='nav nav-treeview'>";
                foreach ($sub_menu->result() as $sub) {
                  $ci = get_instance();
                  if ($sub->url_name == $ci->uri->segment(1)) {
                    echo "<li class='nav-item' ><a class='nav-link active' href='" . $sub->sub_menu_url . "'><i class='" . $sub->sub_menu_icon . "'></i><p>" . $sub->sub_menu_name . "</p></a></li>";
                  } else {
                    echo "<li class='nav-item' ><a class='nav-link' href='" . $sub->sub_menu_url . "'><i class='" . $sub->sub_menu_icon . "'></i><p>" . $sub->sub_menu_name . "</p></a></li>";
                  }
                }
                echo "</ul></li>";
              } else {
                // main menu tanpa sub menu
                $ci = get_instance();
                if ($main->url_name == $ci->uri->segment(1)) {
                  echo "<li class='nav-item'><a class='nav-link active' href='" . $main->menu_url . "'><i class='" . $main->menu_icon . "'></i><p>" . $main->menu_name . "</p></a></li>";
                } else {
                  echo "<li class='nav-item'><a class='nav-link' href='" . $main->menu_url . "'><i class='" . $main->menu_icon . "'></i><p>" . $main->menu_name . "</p></a></li>";
                }
              }
            }
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>