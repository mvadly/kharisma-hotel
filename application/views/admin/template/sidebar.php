<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
$ses_last_login = $this->session->userdata('ses_last_login');
date_default_timezone_set('Asia/Jakarta');
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<style type="text/css">
    .bgfoto{
        background: #1992b1; border-radius: 5px; padding: 10px; max-width:230px;
    }
    .foto{
        margin:auto;
        width: 200px; height: 180px; border-radius: 5px;
    }
    .userses{
        margin:auto; max-width: 200px;  background: white; margin-top: 10px; 
        padding: 5px 5px 5px 5px; border-radius: 5px;
    }
    
</style>
<div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('admin/dashboard') ?>" class="logo"><strong >Admin</strong>istrator</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              

              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                    $foto=$ses_foto;
                    if ($foto==null) {
                            $foto = base_url('assets/upload/foto-user/iconpetugas.png');
                    }else{
                         $foto = base_url('assets/upload/foto-user/'.$ses_foto);
                    }

                ?>
                  <img src="<?php echo $foto;?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $ses_nama;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $foto;?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $ses_nama;?></p>
                      <small style="color:white; font-weight: bolder;"><?php echo $ses_level;?></small>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('admin/user/detail_data/'.$ses_id) ?>" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-left" style="margin-left: 4px; margin-right: 4px;">
                      <a href="<?php echo site_url('admin/user/ganti_password/'.$ses_id) ?>" class="btn btn-default btn-flat">Ganti Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('admin/login/sign_out') ?>" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $foto;?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $ses_nama;?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" id="side-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo site_url('admin/dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Master Data</span>
                <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/dtamu'); ?>"><i class="fa fa-circle-o"></i> Data Tamu</a></li>
                <li><a href="<?php echo site_url('admin/drooms'); ?>"><i class="fa fa-circle-o"></i> Data Room</a></li>
                <li><a href="<?php echo site_url('admin/dfasilitas'); ?>"><i class="fa fa-circle-o"></i> Data Fasilitas</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('admin/dtbc'); ?>"> <i class="fa fa-pie-chart"></i> <span>Booking</span></a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-picture-o"></i>
                <span>Gallery</span>
                <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/gallery'); ?>"><i class="fa fa-circle-o"></i> Home Page</a></li>
                <li><a href="<?php echo site_url('admin/gallery/fnd'); ?>"><i class="fa fa-circle-o"></i> Foods and Drinks</a></li>

                
              </ul>
            </li>
            

            <!-- <li class="treeview">
              <a href="<?php echo site_url('admin/transoff') ?>">
                <i class="fa fa-share"></i> <span>Transaksi</span>
                
              </a>
              
            </li> -->
            <li><a href="<?php echo site_url('admin/promotion') ?>"><i class="fa fa-file"></i> Promotion</a></li>
            <li><a href="<?php echo site_url('admin/claporan') ?>"><i class="fa fa-file"></i> Laporan</a></li>
            <li><a href="<?php echo site_url('admin/user') ?>"><i class="fa fa-users"></i> Data Pengguna</a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Pengaturan</span>
                <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/profil'); ?>"><i class="fa fa-circle-o"></i> Update Profil</a></li>
                
              </ul>
            </li>
            

            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


  <script type="text/javascript">
    $(document).ready(function(){
      $('#side-menu a[href~="' + location.href + '"]').parents('li').addClass('active');
    })
  </script> 
  
