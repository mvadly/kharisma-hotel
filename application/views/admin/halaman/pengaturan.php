<style type="text/css">
  hr{
    border: dashed gray;
  }
</style>
<div class="page-header" >
    <hr/><h2>Pengaturan</h2><hr/>
</div>

<div class="row">
<div class="col-md-12">
<?php $this->load->view('admin/halaman/laporan/pesan') ?>
</div>
            <a href="<?php echo base_url() ?>admin/pengaturan/hapus_cico" onclick="return confirm('beneran nih mau dihapus??')">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-hotel"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  Hapus Seluruh Data Check In / Check Out
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <a href="<?php echo base_url() ?>admin/pengaturan/hapus_book" onclick="return confirm('beneran nih mau dihapus??')">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                  Hapus Seluruh Data Booking
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <a href="<?php echo base_url() ?>admin/pengaturan/kosong_KH" onclick="return confirm('beneran nih mau dikosongin status kamar hotelnya??')">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                  Kosongkan Kamar Hotel
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
            <a href="<?php echo base_url() ?>admin/pengaturan/kosong_CT" onclick="return confirm('beneran nih mau dikosongin status cottagenya??')">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-home"></i></span>
                <div class="info-box-content">
                Kosongkan Cottage
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>
          </div>