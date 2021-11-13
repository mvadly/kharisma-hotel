
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/basic.min.css') ?>">

<script type="text/javascript" src="<?php echo base_url('assets/dropzone.min.js') ?>"></script>

<style type="text/css">


.dropzone {
	border: 2px solid #0087F7;

}

</style>

<div class="page-header">
    <h2>Gallery <small>Home Page</small></h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
 
    	<div class="box-body" >

        <?php $this->load->view('fm') ?>            

			<div class="dropzone">

			  <div class="dz-message">
			   	<h3><i class="fa fa-photo"></i><br/> Klik atau Drop gambar disini</h3>
			  </div>

			</div>

</div>
<div class="form-group">
	<?php
	$folderc2 = "assets/umum/images/homepage";
	$handle2=opendir($folderc2);
	$fileGambar = array('png', 'jpg', 'jpeg', 'gif');
	$i = 1; 


    
                          
                while(($i <= 3) && false !== ($file2 = readdir($handle2)) ){  
                $fileAndExt2 = explode('.', $file2);  
                if(in_array(end($fileAndExt2), $fileGambar)){?>
                	<div class="col-md-3">
                            <div class="thumbnail">
                                <a href="<?php echo base_url('assets/umum/images/homepage/'.$file2); ?>" data-gallery>
                                <img src="<?php echo base_url('assets/umum/images/homepage/'.$file2); ?>"  class="img-responsive " style="min-height: 150px;max-height: 150px;"></a>
                                <div class="caption">
                                  <a href="<?php echo base_url('admin/gallery/hapushp/'.$file2) ?>" class="btn bg-red form-control">Hapus</a>
                                </div>

                            </div>
                     </div>
               <?php }  
            }  

                ?>
</div>
</div>
               


<script type="text/javascript">

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('admin/gallery/uploadhp') ?>",
maxFilesize: 2,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
	
});


//Event ketika foto dihapus



</script>
