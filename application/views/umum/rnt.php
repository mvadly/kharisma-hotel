<?php $this->load->view('umum/header.php');?>


<div style="padding: 20px 20px 20px 20px">

<h1 class="title">Rooms</h1>



<!-- form -->

<table id="tbl" class="table" width="100%">
  <thead>
  
         <tr>
                <th></th>
                

         </tr>
  </thead>

  
  <tbody>
  <?php 


  foreach ($datarooms as $data) {
    
 ?>
  
         <tr>
                    
            <td>
            <p hidden><?php echo $data['kode_rooms'] ?></p>
            
            
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header">
              
   
              </div><!-- /.box-header -->
            <div class="box-body">


              <div class="row" >
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <?php 
                  $datagambar=$this->model->GetDataGambar("where id_gambar='$data[id_gambar]' ")->result_array();
                  $dgr=$this->model->GetDataGambar("where id_gambar='$data[id_gambar]' ")->row_array();

                  ?>
                    <div id="myCarousel<?php echo $dgr['id_gambar'] ?>" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                  

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active lg">
                          <img class="item lg" src="https://www.w3schools.com/bootstrap/la.jpg" alt="Los Angeles" style="width:100%; height: 300px;">
                        </div>
                        <?php foreach ($datagambar as $key) {?>
                        <div class="item lg">
                          <img class="item lg" src="<?php echo base_url('assets/upload/gambar/'.$key['gambar'])?>" style="width:100%; height: 300px;">
                        </div>
                        <?php } ?>
                      
                       
                      </div>

                      <!-- Left and right controls -->

                        
                      <a class="left carousel-control" href="#myCarousel<?php echo $dgr['id_gambar'] ?>" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel<?php echo $dgr['id_gambar'] ?>" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>

                    </div>


                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" >
                  <table class="table text-left" width="100%">
                    <tr>
                      <td width="30%">Kode Rooms</td>
                      <td width="100%"><?php echo $data['kode_rooms'] ?></td>
        
                    </tr>
                    <tr>
                      <td width="30%">Bedrooms</td>
                      <td width="100%"><?php echo $data['jml_kamar'] ?></td>
        
                    </tr>
                    <tr>
                      <td width="30%">Floor</td>
                      <td width="100%"><?php echo $data['lantai'] ?></td>
        
                    </tr>
                    <?php foreach ($tipe->result_array() as $k) {?>
                    <tr >
                    <td><?php echo $k['tipe_bayar'] ?></td>
                    <td >Rp. <?php echo number_format($data['hargasewa']+$k['nominal']) ?>,-</td>
                                                                         
                    </tr>

                    <?php } ?>


                    <tr>
                      <td>Fasilitas</td>
                      <td>Stay 1 night, 1x Breakfast, 21% Goverment Tax & Service </td>
                    </tr>

                    
                    </table>

                </div>


              </div>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
                  

                        
        </td>
         
         
  
      </tr>
      <?php }  ?>
  </tbody>
</table>


</div>

<?php 

include 'footer.php';



?>