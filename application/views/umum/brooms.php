<?php $this->load->view('umum/header.php');
$progress='<img class="img-responsive" src="'.base_url('assets/images/200.gif').'" style="margin: auto;" />';

?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/wizzard/css/form-elements.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/wizzard/css/style.css">

<script>
    $(document).ready(function(){

      

      <?php foreach ($datarooms as $data) {
        $hs=$data['hargasewa']+$nominal;
        $hts= $hs*$lama;
        ?>


      $("#tombol<?php echo $data['kode_rooms']?>").click(function(){

            $("#idc").val('<?php echo $data['id_rooms']?>');
            $("#kc").val('<?php echo $data['kode_rooms']?>');
            $("#jk").val('<?php echo $data['jml_kamar']?>');
            $("#lt").val('<?php echo $data['lantai']?>');
            $("#hs").val('<?php echo $hs  ?>');
            $("#hts").val('<?php echo $hts ?>');
            $("#htsm").val('<?php echo $hts*(30/100) ?>');
            $("#pilih").text('Anda Memilih Room : <?php echo $data['kode_rooms']?>');

            search();

          

      });
      
      <?php } ?>
      function search(){

                      var idc=$("#idc").val();

                      if(idc!=""){
                        $("#result").html('<?php echo $progress; ?>');
                         $.ajax({
                            type:"post",
                            url:"<?php echo base_url('ketersediaan/cari') ?>",
                            data:"idc="+idc+'&tgl_masuk='+'<?php echo $tgl_masuk ?>'+'&tgl_keluar='+'<?php echo $tgl_keluar ?>',
                            success:function(data){
                                $("#result").html(data);
                                if ($("#psn").text()!='Anda bisa booking') {
                                  $("#lanjut").hide();
                                }else{
                                  $("#lanjut").show();
                                }

                             }
                          });
                      }
                      console.log();
                      

                     
                 }

      $("#button").click(function(){
                     search();
                  });


       
        
      

    });

   
</script>
<input type="hidden"  class="ipti"  id="idc" />

<div class="row"  style="padding:20px 20px 20px 20px;">
                    <div class="col-sm-12 ">
                      <form role="form" method="post" class="f1" action="<?php echo site_url();?>bresave/savebook" enctype="multipart/form-data">

                        <h3 style="color: #bfa145;">Reservasi rooms</h3>
                        
                        <div class="f1-steps">
                          <div class="f1-progress">
                              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                          </div>
                          <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p>Pemilihan rooms</p>
                          </div>
                          <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p>Data Lengkap</p>
                          </div>
                            <div class="f1-step ">
                            <div class="f1-step-icon"><i class="fa fa-money"></i></div>
                            <p>Konfirmasi Pembayaran</p>
                          </div>
                        </div>

                        <div class="callout callout-gold">
                          <table class="text-left">
                            <tr>
                              <td colspan="2">Room Tersedia : <?php echo $roomstersedia.' dari tanggal '.date('d-m-Y',strtotime($tgl_masuk)).' sampai '.date('d-m-Y',strtotime($tgl_keluar)); ?></td>
                              
                            </tr>
                            <tr>
                              <td colspan="2"><label id="pilih" >Anda Belum Memilih Rooms</label></td>
                            </tr>
                          </table>
                        </div>
                            <fieldset>
                                


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
                                          <div class="col-sm-5 col-md-5 col-lg-5">
                                            <?php 
                                            $datagambar=$this->model->GetDataGambar("where id_gambar='$data[id_gambar]' ")->result_array();
                                            $dgr=$this->model->GetDataGambar("where id_gambar='$data[id_gambar]' ")->row_array();

                                            ?>
                                              <div id="myCarousel<?php echo $dgr['id_gambar'] ?>" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                            

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                  <div class="item active">
                                                    <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Los Angeles" style="width:100%; height: 300px;">
                                                  </div>
                                                  <?php foreach ($datagambar as $key) {?>
                                                  <div class="item">
                                                    <img src="<?php echo base_url('assets/upload/gambar/'.$key['gambar'])?>" alt="Chicago" style="width:100%; height: 300px;">
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
                                          <div class="col-sm-5 col-md-5 col-lg-5" >
                                            <table class="table" width="100%">
                                              <tr>
                                                <td width="30%">Kode Room</td>
                                                <td width="100%"><?php echo $data['kode_rooms'] ?></td>
                                  
                                              </tr>
                                              <?php foreach ($tipe->result_array() as $k) {?>
                                              <tr>
                                              <td><?php echo $k['tipe_bayar'] ?></td>
                                              <td>Rp. <?php echo number_format($data['hargasewa']+$k['nominal']) ?>,-</td>
                                                                                                   
                                              </tr>

                                              <?php } ?>


                                              <tr>
                                                <td>Fasilitas</td>
                                                <td>Stay 1 night, 1x Breakfast, 21% Goverment Tax & Service </td>
                                              </tr>

                                              
                                              </table>
                                              <br>
                                          </div>
                                         

                                          <div class="col-sm-2 col-md-2 col-lg-2">
                                            <button type="button" id="tombol<?php echo $data['kode_rooms']?>" data-target="#modal" data-toggle="modal" class="btn bg-green" style="text-align: center;">Pilih</button>
                                            <?php $this->load->view('umum/modalpesan'); ?> 


                                          </div>
                                          <br>

                                        </div>

                                      </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                            

                                                  
                                  </td>
                                   
                                   
                            
                                </tr>
                                <?php }  ?>
                            </tbody>
                     </table>
                               
                                    
                                
                            </fieldset>
                        
                        <fieldset>
                        <div class="col-md-8" >
                                <!-- general form elements disabled -->
                          <div class="box box-warning">
                            <div class="box-header">
                              <h3 class="box-title">Input Data Pelanggan</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                  <input type="text"  class="form-input" name="no_id" required  placeholder="No. Identitas" />
                                </div>
                                <div class="form-group">
                                  <input type="text" name="nama_tamu"  class="form-input" required placeholder="Nama Tamu"/>
                                </div>
                                <div class="form-group">
                                  <select name="jeniskelamin" class="form-input" required>
                                      <option selected>Jenis Kelamin</option>
                                      <option value="Laki-laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <?php $this->load->view('umum/daerah'); ?>
                                </div>
                                <div class="form-group">
                                  <div class='input-group date' id='datepicker'>
                                      <input type="date" name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir" />
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                  </div>
                                </div>
                                  <div class="form-group">
                                    <input type="text" name="no_telp" class="form-input" required placeholder="No. Telepon" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-input" required placeholder="Email" />
                                </div>
                                
                              </div>
                              <div class="box-footer">
                                    <div class="f1-buttons" >
                                        <button type="button" class="btn btn-previous">Previous</button>
                                        <button type="button" class="btn btn-next">Next</button>
                                    </div>
                                  </div><!-- /.box-footer-->
                            </div>
                          </div>
                          <div class="col-md-4" >
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                  <div class="box-header">
                                    <h3 class="box-title">Rooms Terpilih <small>(<?php echo ucfirst($tipebook) ?>)</small></h3>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <div class="form-group">
                                  <label>Kode Room</label>
                                      <input type="text" name="kode_rooms" readonly="text" class="ipti"  id="kc" />
                                    
                                  </div>

                                  <div class="form-group">
                                  <label>Jumlah Kamar</label>
                                      <input type="text" name="jml_kamar" readonly="text" class="ipti"  id="jk" />
                                    
                                  </div>
                                  <div class="form-group">
                                  <label>Lantai</label>
                                      <input type="text" name="jml_kamar" readonly="text" class="ipti"  id="lt" />
                                    
                                  </div>
                                  <div class="form-group">
                                  <label>Harga Sewa</label>
                                      <input type="text" name="hargasewa" readonly="text" class="ipti" id="hs" />
                                    
                                  </div>
                                  
                                 
                                  
                                  </div><!-- /.box-body -->
                                  
                                </div><!-- /.box -->
                              </div>
                            </fieldset>

                            <fieldset>
                              
                              <div class="col-md-8" >
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                  <div class="box-header">
                                    <h3 class="box-title">Yang harus dibayar</h3>
                                    <input type="hidden" name="code" value="<?php echo date('ymsih00d') ?>">
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <div class="form-group">
                                    <label>ID Booking</label>
                                      <input type="text" name="booksid" readonly="text" class="ipti"  value="<?php echo 'B'.date('dyhis0m') ;?>" />
                                    
                                  </div>

                                  <div class="form-group">
                                    <label>Tanggal Check In</label>
                                      <input type="text" name="tgl_masuk" readonly="text" class="ipti"  value="<?php echo $tgl_masuk;?>" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Tanggal Check Out</label>
                                      <input type="text" name="tgl_keluar" readonly="text"  class="ipti" value="<?php echo $tgl_keluar;?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Lama</label>
                                      <input type="text" name="lama" readonly="text" class="ipti"  value="<?php echo $lama;?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Dewasa</label>
                                      <input type="text" name="adult" readonly="text" class="ipti"  value="<?php echo $this->session->userdata('adult');?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Anak</label>
                                      <input type="text" name="child" readonly="text" class="ipti"  value="<?php echo $this->session->userdata('child');?>"  />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Total Harga Sewa</label>
                                      <input type="text" name="total_harga_sewa" readonly="text" class="ipti" id="hts" />
                                    
                                  </div>
                                  <div class="form-group">
                                    <label>Minimal Bayar</label>
                                      <input type="text"  readonly="text" class="ipti" id="htsm" />
                                    
                                  </div>

                                  <div class="f1-buttons">
                                      <button type="button" class="btn btn-previous">Previous</button>
                                      <button type="button" data-target="#tanya" data-toggle="modal" class="btn btn-new">Simpan</button>
                                  </div>
                                    <?php $this->load->view('umum/modalsubmit'); ?>                        
                                  
                                  </div><!-- /.box-body -->
                                </div><!-- /.box -->
                              </div>
                              <div class="col-md-4" >
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                  <div class="box-header">
                                    <h3 class="box-title">How To Pay</h3>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                  <ol type="number" style="text-align: justify;">

                                    <li>Enter PIN.</li>
                                    <li>Choose "Transfer". If using Other Banks' ATM, choose "Others" then "Transfer".</li>
                                    <li>Choose "Other Bank Account".</li>
                                    <li>Enter the bank code (Cimb Niaga is 022) followed by <span style="font-weight: bolder;" class="text-green">4700100291006</span> as the destination account, then choose "Correct".</li>
                                    
                                    <li>Enter the number reference <span style="font-weight: bolder;" class="text-danger"><?php echo date('ymsih00d') ?></span> as your payment code, then choose "Correct".</li>
                                    <li>Enter the exact amount as your transaction value (Incorrect transfer amount will result in failed payment), then choose "Correct"</li>
                                    <li>After that, take the payment token picture and upload in a <a href="<?php echo base_url('cekbook') ?>" target="_blank">Payment Form</a>.</li>
                                    <li>Done.</li>
            
                                  </ol>
                                  
                                 
                                  
                                  </div><!-- /.box-body -->
                                  
                                </div><!-- /.box -->
                              </div>
                              
                                
                                
                                
                            </fieldset>
                      
                      </form>
                    </div>
                </div>

<?php 
include 'footer.php';



?>
