<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Tamu</h4>
            </div>
            <form action="<?php echo site_url('admin/dtamu/simpan_data');?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Tamu</label>
                        <input type="text" name="kode_tamu" class="form-control" value="<?php echo 'T'.date('hsdy');?>" readonly/>
                        
                    </div>
                    <div class="form-group">
                        <label>No. Identitas</label>
                        <input type="text" name="no_id" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_tamu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control">
                        	<option disabled>Pilih</option>
                        	<option value="laki-laki">Laki-laki</option>
                        	<option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="form-group">
                            <div class='input-group date' id='datepicker'>
                                <input type='text' name="tgl_lahir" class="form-control" />
                                <span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Warga Negara</label>
                        <?php $this->load->view('umum/daerah') ?>
                    </div>
                    <div class="form-group">
                        <label>Nomor Kontak</label>
                        <input type="text" name="no_telp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
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
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>