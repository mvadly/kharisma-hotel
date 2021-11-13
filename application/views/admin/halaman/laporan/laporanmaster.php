<div class="page-header">
    <h2>Cetak Laporan</h2>
</div>
<?php $this->load->view('admin/halaman/laporan/pesan');?>
<div >
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laporan Data Master
                    <a href="#widget2" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                    </a>
                </div>
                <div id="widget2" class="panel-body collapse in">
                    <form action="<?php echo base_url()?>admin/claporan/cetak_master" method="post">
                    
                        <div class="form-group">
                            <label>Pilih Laporan</label>
                            <select name="laporan1" class="form-control">
                                <option disabled selected>Pilih</option>
                                <option value="d_tamu">Tamu</option>
                                <option value="d_rooms">Rooms</option>
                                <option value="d_fasilitas">Fasilitas</option>
                            </select>

                        </div>

                        <div class="pull-right">
                        <button type="submit" target="_blank" class="btn btn-success">
                                    <span class="fa fa-print"></span> Print
                                </button>
                       </div>     
                      
                        </form>
                </div>
            </div>
      </div>

<div >
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laporan Transaksi Rooms
                    <a href="#widget2" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                    </a>
                </div>
                <div id="widget2" class="panel-body collapse in">

                    <form action="<?php echo base_url() ?>admin/claporan/cetak_trans" method="post" name="form_cek" id="form_cek">
                        
                        <div class="form-group">
                            <label>Pilih Laporan</label>
                            <select name="laporan2" class="form-control">
                                <option disabled selected>Pilih</option>
                                <option value="d_bookingct_acc">Booking Diterima</option>
                                <option value="d_bookingct_rjc">Booking Ditolak</option>
                                <option value="d_checkinct">Check In</option>
                                <option value="d_checkoutct">Check Out</option>
                            
                            </select>
                            </div>
        
                         
                                <div class="form-group">
                                    <div class='input-group date ' id='datepicker1'>
                                        <input type='text' name="dari" class="form-control" placeholder="Dari" />
                                        <span class="input-group-addon" >
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class='input-group date' id='datepicker2'>
                                        <input type='text' name="ke" class="form-control" placeholder="Ke" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                           
                          <div class="pull-right">
                            <button type="submit" class="btn btn-success">
                                    <span class="fa fa-print"></span> Print
                                </button></a>
                            
                        </div>
                    </form>
                </div>
            </div>
      </div>
<div >
            


<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker1,#datepicker2,#datepicker3,#datepicker4').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    


        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>