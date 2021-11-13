<!-- ============ MODAL EDIT =============== -->
        <?php foreach ($dataCIKH as $data) {
            $masuk = $data['tgl_masuk'];
            $keluar = $data['tgl_keluar'];
            $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));?>
                <div id="modaltci<?php echo $data['kode_sewa']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog" >
                    <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Jadwal Check In</h3>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('admin/dcheckinkh/updatejadwalci') ?>" enctype="multipart/form-data">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Sewa</label>
                            <div class="col-xs-9">
                                <input name="kode_sewa" class="form-control" type="text" value="<?php echo $data['kode_sewa'];?>"  readonly>
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
                            <label class="control-label col-xs-3" >Kode Kamar</label>
                            <div class="col-xs-9">
                                <input name="kode_kamar" class="form-control" type="text" value="<?php echo $data['kode_kamar'];?>"  readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Blok</label>
                            <div class="col-xs-9">
                                <input name="namablok" class="form-control" type="text" value="<?php echo $data['namablok'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Check In</label>
                        <div class="col-xs-9">
                            <div class="input-group date" id="tgl1">
                                <input type="text" class="form-control" name="tgl_masuk" value="<?php echo $masuk ?>" readonly />   
                                    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-xs-3" >Tanggal Check Out</label>
                        <div class="col-xs-9">
                            <div class="input-group date" id="tglk<?php echo $data['kode_sewa'] ?>" >
                                <input type="text" class="form-control" name="tgl_keluar" placeholder="Tanggal Check Out" value="<?php echo $keluar ?>" required/>  
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
            <?php }   ?>
<script>
<?php foreach ($dataCICT as $data) {?>

$(function() { 
  
  $('#datepicker').datetimepicker({
   locale:'id',
   format:'YYYY-MM-DD'
   });

  $('#tgl1').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD'
   });
   
  $('#tglk<?php echo $data['kode_sewa'] ?>').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD'
   });
   

  

});

<?php } ?>


</script>   
