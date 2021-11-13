<div class="page-header">
    <h2>Data User</h2>
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
                <div class="modal-dialog">
                    <form action="<?php echo site_url('admin/user/update_data')?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" class="form-control" name="nama_user" required value="<?php echo $nama_user;?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pw" class="form-control" value="password">
                                <input type="hidden" name="pass" value="<?php echo $ps;?>">
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="level">
                                    <?php
                                    $lvl=array('','Manager','Front Office','Super Admin');
                                            foreach ($lvl as $k) {
                                                if ($level==$k){
                                                    echo "<option value='$k' selected>$k</option>";
                                                }else{
                                                    echo "<option value='$k'>$k</option>";
                                                }
                                            }
                                    ?>
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="hidden" name="foto" value="<?php echo $foto;?>">
                                <?php if ($foto == null){echo '<p>Tidak ada Foto</p>';}else{?>
                                    <img src="<?php echo base_url();?>assets/upload/foto-user/<?php echo $foto;?>" class="img-responsive" width="110">
                                <?php }?>
                                <input type="file" class="form-control" id="" name="file_upload" placeholder="">
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