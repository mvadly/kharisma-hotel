
<!DOCTYPE html>
<?php $profil=$this->model->profil()->row_array(); ?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo $profil['company_name'] ?></title>
<link href="<?php echo base_url();?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">
<!-- Google fonts -->

<!-- font awesome -->
<link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">


<!-- bootstrap -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/umum/assets/bootstrap/css/bootstrap.min.css" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>assets/umum/assets/uniform/css/uniform.default.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/umum/assets/wow/animate.css" />


<!-- gallery -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/umum/assets/gallery/blueimp-gallery.min.css">


<!-- favicon -->
<link rel="shortcut icon" href="<?php echo site_url('assets/img/'.$profil['logo']) ?>" type="image/x-icon">
<link rel="icon" href="<?php echo site_url('assets/img/'.$profil['logo']) ?>" type="image/x-icon">



<link href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/dataTables.responsive.css');?>" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url()?>assets/umum/assets/style.css">







<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url();?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js"></script>


<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;

    background: red;
   text-align: center;
}
</style>

</head>

<body id="home" >


<!-- header -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo site_url('') ?>"><img src="<?php echo site_url('assets/img/'.$profil['logo']) ?>" height="53px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li><a href="<?php echo site_url('cekbook') ?>">Check Booking Status</a></li>
        <li><a href="<?php echo site_url('rnt') ?>">Rooms</a></li>
        <li><a href="<?php echo site_url('packages') ?>">Packages</a></li>
        <li><a href="<?php echo site_url('index/promotion') ?>">Promotion</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gallery <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('index/gallery') ?>">Rooms</a></li>
            <li><a href="<?php echo site_url('index/galleryf') ?>">Facilities</a></li>
          </ul>
        </li>
        <li><a href="<?php echo site_url('index/aboutus') ?>">About Us</a></li>
        <li><a href="<?php echo site_url('index/trackus') ?>">Track Us</a></li>
      </ul>
      
    </div>
  </div>
</nav>
<!-- header -->

