<?php $this->load->view('umum/header.php');?>


<div class="" style="padding: 20px 20px 20px 20px">

<h1 class="title">Promotion</h1>



<!-- form -->
	<div class="row">
	<?php foreach ($promosi as $v) {?>
		<div class="col-md-6">
			<div class="text-uppercase" style="font-weight: bolder;"><?php echo $v['title_prm'] ?></div><br>
			<div class="">Date Post: <?php echo date('d F Y H:i:s',strtotime($v['tgl_post'])) ?></div><br>
			<div class="thumbnail img-responsive" >
			<img  src="<?php echo base_url('assets/upload/promotion/'.$v['gambar'])?>" style="height:300px;"  />
			</div>
		</div>

	<?php } ?>
	</div>
</div>

<?php 

include 'footer.php';



?>