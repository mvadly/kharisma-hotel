<div class="page-header">
    <h2>Data Tamu</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
                        
                    <form action="<?php echo site_url('admin/dtamu/update_data')?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="kode_tamu" class="form-control" value="<?php echo $kode_tamu;?>"/>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Tamu</label>
                                <input type="text" name="kode_tamu" class="form-control" value="<?php echo $kode_tamu;?>" disabled/>
                                
                            </div>
                            <div class="form-group">
                                <label>No. Identitas</label>
                                <input type="text" name="no_id" class="form-control" value="<?php echo $no_id;?>" />
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_tamu" class="form-control" value="<?php echo $nama_tamu;?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" name="jeniskelamin" class="form-control" value="<?php echo $jeniskelamin;?>">
                            </div>
                            <div class="form-group">
                                <label>Warga Negara</label>
                                <input type="text" name="warganegara" class="form-control" value="<?php echo $warganegara;?>">
                            </div>
                            <div class="form-group">
                        	<label>Tanggal Lahir</label>
                        	<div class="form-group">
                            	<div class='input-group date' id='datepicker'>
                               	 <input type='text' name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir;?>" />
                                	<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
									</span>
                            	</div>
                        	</div>
                    		</div>
                    		<div class="form-group">
                                <label>Nomor Kontak</label>
                                <input type="text" name="no_telp" class="form-control" value="<?php echo $no_telp;?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
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