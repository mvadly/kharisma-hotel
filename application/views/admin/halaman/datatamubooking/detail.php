
<div class="page-header" >
    <h2>Data Booking <small>Rooms</small></h2>
</div>
<div class="row" >
    <div class="col-sm-12 col-md-12" >
        <div class="panel panel-default" >
            <div class="panel-heading">
                Detail Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" >
                <div class="col-md-3">
                <div style="margin: 10px;">
                <?php 
                    if ($buktip==null) {
                        echo "Tidak ada bukti pembayaran";
                    }else{
                ?>
                <img style=" border-radius: 5px; " src="<?php echo base_url('/assets/upload/buktibayar/'.$buktip);?>" width="240" height="300"/>
                <?php }?>
                </div>
                </div>
                <div class="col-md-9">
                    <div >
                    <?php 
                        $lama = ((abs(strtotime($tgl_keluar)-strtotime($tgl_masuk)))/(60*60*24));
                        $total_harga_sewa=0;
                        $total_harga_sewa=($hargasewa)*$lama;
                        $linkform='#';
                        if ($status_ci=='checkin') {
                            $linkform = '#';
                            echo "untuk yg status cekin";
                        }else
                      
                        if ($status_ci=='booked') {
                            $linkform = base_url('admin/dtbc/konf_book_ct');
                            echo "untuk konfirmasi status yg sudah booking";
                        }else if ($status_ci=='done'){
                            $linkform = '#';
                            echo "untuk status yg sudah selesai checkin";
                        }else{
                            echo "untuk yg belum ditanggapi pembayaran";
                            $linkform = base_url('admin/dtbc/accept_data');
                        }
                        if ($status_ci=='unverified') {
                            $stts='default';
                        }else if ($status_ci=='booked') {
                            $stts='success';
                        }else if ($status_ci=='rejected') {
                            $stts='danger';
                        }else if ($status_ci=='checkin') {
                            $stts='primary';
                        }else{
                            $stts='warning';
                        }

                    ?>
                        <form action="<?php echo $linkform?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_books" value="<?php echo $id_books; ?>"/>
                        <input type="hidden" name="kode_rooms" value="<?php echo $kode_rooms; ?>"/>
                        <input type="hidden" name="kode_tamu" value="<?php echo $kode_tamu; ?>"/>
                        <input type="hidden" name="nama_tamu" value="<?php echo $nama_tamu; ?>"/>
                        <input type="hidden" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>"/>
                        <input type="hidden" name="tgl_keluar" value="<?php echo $tgl_keluar; ?>"/>
                        <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                        <input type="hidden" name="pembayaran" value="<?php echo $total_harga_sewa ?>"/>
                        <table class="table" border="0">
                            <tr>
                                <td>ID Pembayaran <strong><?php echo $id_books; ?></strong> <span class="label label-<?php echo $stts; ?> " style="float: right;" ><?php echo $status_ci ?></span><br>
                                    </strong> <span class="label label-success " style="float: right;" ><?php echo $transby ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?php $this->load->view('admin/halaman/datatamubooking/tamu'); 
                                $this->load->view('admin/halaman/datatamubooking/rooms');
                                $this->load->view('admin/halaman/datatamubooking/bayar'); ?>
                                
                                </td>
                            
                            </tr>

                            

                        </table>
                        
                    </div>
                </div>
                <?php
                $book1=$this->model->GetCheckBCT("where kode_rooms='$kode_rooms' AND status_ci!='unverified' AND tgl_masuk between '$tgl_masuk' and '$tgl_keluar' ")->num_rows();
                $book2=$this->model->GetCheckBCT("where kode_rooms='$kode_rooms' AND status_ci!='unverified' AND tgl_keluar between '$tgl_masuk' and '$tgl_keluar' ")->num_rows();

                

                if (($book1==0) or ($book2==0)) {
                    $hasil=0;
                }
                //echo $book1.' - '.$book2.' - '.$hasil;
                
                ?>
                <div class="modal-footer">
                <?php
                

                 if ($status_ci=='booked' || $tgl_masuk < date('Y-m-d')) {?>
                      
                       <?php if ($tgl_masuk==date('Y-m-d')) { 
                            echo '<input type="submit" class="btn bg-green" value="Konfirmasi Check In" name="simpan">';

                        } ?>
                        
                        
                    <?php }else if ($status_ci=='unverified'){ ?>
                        <select name="aksi" class="btn bg-green" style="color: white; background: rgba(0,0,0,0);">
                            <option disabled selected>Pilih</option>
                            <?php if ($hasil<1) { echo '<option value="terima">Accept</option>'; } ?>
                            <option value="tolak">Reject</option>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Aksi" name="update">
                            <!-- <a href="#"><button type="reset" class="btn btn-danger ">Reject</button></a> -->

                    <?php }  ?>
                            
                </form>
                <button class="btn btn-default" onclick="history.back()"><span class="glyphicon glyphicon-step-backward"></span> Kembali</button>
                </div>


            </div>
        </div>
    </div>
</div>