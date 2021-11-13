<?php $this->load->view("umum/header");?>
<div class="container">

       <h1 class="title"><?php echo $title ?></h1>
       <div class="row gallery">

       <?php foreach ($gambar as $data) {?>

              <div class="col-sm-4 wowload fadeInUp">
                     <div class="thumbnail tmb" >

                     
                     <img src="<?php echo base_url() ?>assets/upload/gambar/<?php echo $data['gambar']; ?>" class="img-responsive md" >

                     <div class="caption">
                     <a href="<?php echo base_url(); ?>assets/upload/gambar/<?php echo $data['gambar']; ?>" title="<?php echo $data['id_gambar']; ?>" class="btn btn-new" data-gallery>Lihat</a>
                     </div>
                     
                     </div>
              </div>
       <?php }?>
              
       </div>
</div>
<script src="<?php echo base_url() ?>assets/umum/assets/jquery.js"></script>
<?php include 'footer.php';?>