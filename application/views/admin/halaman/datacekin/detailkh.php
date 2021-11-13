
<div class="page-header" >
    <h2>Data Check In</h2>
</div>
<div class="row" >
    <div class="col-sm-12 col-md-12" >
        <div class="panel panel-default" >
            <div class="panel-heading">
                Detail Data <span style="font-weight: bolder; float: right;"><?php echo $kode_sewa; ?></span>
            </div>

                        <form action="<?php echo base_url()?>admin/dcheckinkh/cekout" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="kode_sewa" value="<?php echo $kode_sewa; ?>"/>
                        <input type="hidden" name="kode_kamar" value="<?php echo $kode_kamar; ?>"/>
                        <input type="hidden" name="kode_tamu" value="<?php echo $kode_tamu; ?>"/>
                        <input type="hidden" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>"/>
                        <input type="hidden" name="tgl_keluar" value="<?php echo $tgl_keluar; ?>"/>
                        <table class="table" border="0">
                            <tr>
                                <td><input type="submit" class="btn bg-red" value="Check Out" name="update">
                        <button onclick="history.back();" class="btn bg-orange">Batal</button></td>
                            </tr>
                            <tr>
                                <td>
                                <?php 
                                $this->load->view('admin/halaman/datacekin/tamu');
                                $this->load->view('admin/halaman/datacekin/kamarhotel');
                                $this->load->view('admin/halaman/datacekin/bayar'); 
                                ?>
                                
                                </td>
                            
                            </tr>

                            

                        </table>
                        
                    </div>
                    <div style="background:white; border-radius:5px; padding: 10px 10px 10px 10px; margin-top: -10px; box-shadow: rgba(0,0,0,0.2) 1px 1px 1px 1px  ;">

                        
                    </div>

                        

                            
                </form>

</div>