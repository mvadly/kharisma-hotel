<div class="page-header">
    <h2>Profil</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Profil
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
                    
                    <form action="<?php echo site_url('admin/profil/update_data')?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">
                        <?php $this->load->view('fm')?>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="company_name" class="form-control" value="<?php echo $company_name;?>"/>
                                
                            </div>
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea id="text-ckeditor" name="about"><?php echo $about; ?></textarea>
                                <script type="text/javascript">CKEDITOR.replace('text-ckeditor');</script>
                            </div>
                            <div class="form-group">
                                <label>Tentang</label>
                                <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="telp" class="form-control" value="<?php echo $telp;?>"/>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" value="<?php echo $fax;?>"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email;?>" />
                            </div>
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="hidden" name="foto" value="<?php echo $logo;?>">
                                <?php if ($logo == null){echo '<p>Tidak ada Foto</p>';}else{?>
                                    <img src="<?php echo base_url();?>assets/img/<?php echo $logo;?>" class="img-responsive" width="110">
                                <?php }?>
                                <input type="file" class="form-control"  name="file_upload" >
                            </div>
                            
                            
                        <div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger ">Reset</button>
                            <button type="button" class="btn btn-warning " onclick="history.back();">Batal
                            </button>
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
