<!-- ============ MODAL EDIT =============== -->
        <?php foreach ($datatb as $data) {
            $masuk = $data['tgl_masuk'];
            $keluar = $data['tgl_keluar'];
            $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));?>
                <div id="modalbct<?php echo $data['id_books']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog" >
                    <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Booking</h3>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/dtbc/updatejadwalci') ?>" enctype="multipart/form-data">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >ID Booking</label>
                            <div class="col-xs-9">
                                <input name="id_books" class="form-control" type="text" value="<?php echo $data['id_books'];?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Tamu</label>
                            <div class="col-xs-9">
                                <input name="kode_tamu" class="form-control" type="text" value="<?php echo $data['kode_tamu'];?>"  readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Tamu</label>
                            <div class="col-xs-9">
                                <input name="nama_tamu" class="form-control" type="text" value="<?php echo $data['nama_tamu'];?>" readonly>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-xs-3" >Kode rooms</label>
                            <div class="col-xs-9">
                                <input name="kode_rooms" class="form-control" type="text" value="<?php echo $data['kode_rooms'];?>"  disabled>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Check In</label>
                        <div class="col-xs-9">
                            <div class="input-group date"  >
                                <input type="text" class="form-control" id="tgl1<?php echo $data['id_books'] ?>" name="tgl_masuk" value="<?php echo $masuk ?>" readonly />   
                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-xs-3" >Tanggal Check Out</label>
                        <div class="col-xs-9">
                            <div class="input-group date" >
                                <input type="text" class="form-control" id="tgl2<?php echo $data['id_books'] ?>" name="tgl_keluar" placeholder="Tanggal Check Out" value="<?php echo $keluar ?>" required/>  
                            <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>      
                            </div>
                        </div>
                    </div>



                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" name="Update" class="btn bg-blue">Konfirmasi</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>
<script>
 <?php foreach ($datatb as $data) {?>

$(document).ready(function() { 


  $('#tgl1<?php echo $data['id_books'] ?>').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD',
   minDate:'<?php echo $masuk ?>'
   });
   
  $('#tgl2<?php echo $data['id_books'] ?>').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD',
   minDate:'<?php echo $masuk ?>'
   });



  var stts = $("#stts<?php echo $data['id_books']; ?>").text();
  if (stts=='Booked') {
    $("#tgl1<?php echo $data['id_books'] ?>").removeAttr("disabled");
  }
})


   
  



<?php } ?>


</script>   
