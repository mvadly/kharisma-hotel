
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Room</h4>
            </div>
            <form action="<?php echo site_url('admin/drooms/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Room</label>
                        <input type="text" name="kode_rooms" class="form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Jumlah Kamar</label>
                        <input type="number" name="jml_kamar" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Lantai</label>
                        <input type="text" name="lantai" class="form-control" maxlength="1" required/>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="number" name="hargasewa" class="hargasewa form-control">
                    </div>
                    
        
                    
                    
                    
                            
                    
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
        </div>
    </div>
</div>
