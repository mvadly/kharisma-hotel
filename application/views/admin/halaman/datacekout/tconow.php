<div class="box box-solid box-danger">
                  <div class="box-header">
                    <h3 class="box-title">Daftar Tamu Check Out Rooms Hari Ini : <strong><?php echo $tcekout->num_rows();?></strong></h3>
                  </div>
                  <div class="box-body">
                    <div id="widget1" class="panel-body collapse in">
            <fieldset >
            <table id="table2" class="table penelitian table-bordered table-striped " width="100%" >
                <thead>
                    <tr>
                        <th>ID Booking</th>
                        <th>Kode Tamu</th>
                        <th>Nama Tamu</th>
                        <th>Kode rooms</th>
                        <th>Lama Sewa</th>
                        <th class="text-center" width="100">Opsi</th>
                    </tr>
                </thead>
                
                <?php foreach ($tcekout->result_array() as $data) {
                                                $masuk = $data['tgl_masuk'];
                                                $keluar = $data['tgl_keluar'];
                                                $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

                                                ?>
                                            <tr>
                                                <td><?php echo $data['id_books']?></td>
                                                <td><?php echo $data['kode_tamu']?></td>
                                                <td><?php echo $data['nama_tamu']?></td>
                                                <td><?php echo $data['kode_rooms']?></td>
                                                <td><?php echo $lama; ?> Hari</td>
                        <td style="text-align:center;">
                            <?php if (($this->session->userdata('ses_level') == 'Manager') or ($this->session->userdata('ses_level') == 'Super Admin')){}else{?>

                            <a data-target="#modalcoct<?php echo $data['id_books']?>" data-toggle="modal" title="Lihat"><button class="btn btn-primary">Lihat</button></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                
            </table>
               </fieldset>
                                
                            

                    </div>
                  </div>
                </div>
             


        <!-- ============ MODAL EDIT =============== -->
        <?php foreach ($tcekout->result_array() as $data) {
            $masuk = $data['tgl_masuk'];
            $keluar = $data['tgl_keluar'];
            $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));?>
                <div id="modalcoct<?php echo $data['id_books']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog" >
                    <div class="modal-content" style="padding: 20px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Detail Cekout <small>(<?php echo $data['tipe'] ?>)</small></h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url()?>admin/dashboard/checkout">
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
                            <label class="control-label col-xs-3" >Kode Rooms</label>
                            <div class="col-xs-9">
                                <input name="kode_rooms" class="form-control" type="text" value="<?php echo $data['kode_rooms'];?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Sewa</label>
                            <div class="col-xs-9">
                                <input name="hargasewa" class="form-control" type="text" value="Rp. <?php echo number_format($data['hargasewa']+$data['nominal']);?>,-" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Tanggal Masuk</label>
                            <div class="col-xs-9">
                                <input name="tgl_masuk" class="form-control" type="text" value="<?php echo date('D, d M Y',strtotime($masuk));?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Lama Sewa</label>
                            <div class="col-xs-9">
                                <input name="lama" class="form-control" type="text" value="<?php echo $lama;?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Total Sewa</label>
                            <div class="col-xs-9">
                                <input name="pembayaran" class="form-control" type="text" value="Rp. <?php echo number_format(($data['hargasewa']+$data['nominal'])*$lama);?>,-" readonly>
                            </div>
                        </div>


                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <input type="submit" class="btn bg-blue" name="cekout" value="Konfirmasi" />
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        


                   
 
        
 