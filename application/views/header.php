<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--standarisasi untuk pengkodean dalam sistem operasi, bahasa pemprograman, API dan software-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Manajemen PT. Bumi Aki Boga">
    <meta name="author" content="Edwin Budiyanto Sunardi">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminLTE/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery/jquery-3.5.1.min.js"></script>
</head>
<!-- <body class="hold-transition sidebar-mini">
      <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
    


          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li>
          </ul>
        </nav>
        
      </div>
    </body> -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="../../index3.html" class="brand-link">

                <span class="brand-text font-weight-light">Bumi Aki</span>
            </a>


            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('admin_fullname');?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php echo $this->navigation->generateMenuAdmin($privilage, $active_menu, $active_sub_menu, $active_sub_menu2, $active_sub_menu3);?>
                    </ul>
                </nav>
            </div>
        </aside>