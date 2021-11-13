<div class="page-header">
    <h2>Data Rooms</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
                    
                    <form action="<?php echo site_url('admin/drooms/update_data')?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="kode_rooms" class="form-control" value="<?php echo $kode_rooms;?>"/>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Jumlah Kamar</label>
                                <input type="number" name="jml_kamar" class="form-control" value="<?php echo $jml_kamar;?>" />
                            </div>
                            <div class="form-group">
                                <label>Lantai</label>
                                <input type="number" name="lantai" class="form-control" value="<?php echo $lantai;?>" />
                            </div>
                            <div class="form-group">
                                <label>Harga Sewa</label>
                                <input type="number" name="hargasewa" class="form-control" value="<?php echo $hargasewa;?>">
                            </div>
                            
                           
                            
                        </div>
                    
                            
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger ">Reset</button>
                            <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                            </button>
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">    
        <?php echo $jsArray; ?>  
        function changeValue(id_gambar){  
        document.getElementById('g1').src = dtgambar[id_gambar].gambar1;
        document.getElementById('g2').src = dtgambar[id_gambar].gambar2;     
        document.getElementById('g3').src = dtgambar[id_gambar].gambar3;  
        document.getElementById('g4').src = dtgambar[id_gambar].gambar4; 
        }; 
</script>