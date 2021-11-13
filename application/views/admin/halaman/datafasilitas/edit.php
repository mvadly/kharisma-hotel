<div class="page-header">
    <h2>Data Fasilitas</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
                    <?php $this->load->view('fm')?>
                    <form action="<?php echo site_url('admin/dfasilitas/update_data')?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID Fasilitas</label>
                                <input type="text" name="id_fasilitas" class="form-control" value="<?php echo $id_fasilitas;?>"/>
                                
                            </div>
                            <div class="form-group">
                                <label>Nama Fasilitas</label>
                                <input type="text" name="nama_fasilitas" class="form-control" value="<?php echo $nama_fasilitas;?>" />
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $harga;?>" />
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea id="text-ckeditor" name="ket_fasilitas"><?php echo $ket_fasilitas; ?></textarea>
                                <script type="text/javascript">CKEDITOR.replace('text-ckeditor');</script>
                            </div>
                            <div>

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
