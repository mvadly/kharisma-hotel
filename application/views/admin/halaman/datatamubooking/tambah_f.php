<!--    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.autocomplete.js"></script>
    <link href="<?php echo base_url();?>assets/js/jquery.autocomplete.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/default.css" rel="stylesheet" />
<style type="text/css">
    td{
        padding: 5px;
    }
    table{
        border-collapse: collapse;
        border: 1px solid rgba(0,0,0,0.1);
        background: rgba(0,0,0,0.1);
 
    }
</style> -->
    <!-- <script type='text/javascript'>
        var site = "<?php echo base_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/autocomplete/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_id[]').val(''+suggestion.id_fasilitas); // membuat id 'v_nim' untuk ditampilkan
                    $('#v_harga[]').val(''+suggestion.harga); // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script> -->
<div class="page-header">
    <h2>Booking</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Fasilitas
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
                    


                    <form action="<?php echo site_url('admin/dtbc/simpan_f')?>" enctype="multipart/form-data" method="post">

                        <div class="modal-body">
                            <div class="form-group">
                                <label>ID Booking</label>
                                <input type="hidden" name="detail_f" class="form-control" value="<?php echo $detail_f;?>" readonly/>
                                <input type="text" name="id_books" class="form-control" value="<?php echo $id_books;?>" readonly/>
                                
                            </div>
                            <div class="form-group">
                                <label>Kode Tamu</label>
                                <input type="text" name="kode_tamu" class="form-control" value="<?php echo $kode_tamu;?>" readonly/>
                            </div>

                           <!--  <div class="form-group">
                              <label>Select Multiple</label>
                              <select multiple="" class="form-control">
                              <?php foreach ($dfas as $key) {?>
                                <option><?php echo $key['nama_fasilitas'] ?></option>
                              <?php } ?>
                            
                              </select>
                            </div> -->
                            <?php $this->load->view("fm") ?>
                            <label>Fasilitas Terpilih</label><br>
                            <?php $this->load->view('admin/halaman/datatamubooking/modalfasilitas') ?>
                            <?php $this->load->view('admin/halaman/datatamubooking/fasilitasterpilih') ?>
                            
       
                            <!-- <div class="form-group" id="fas">
                                <label>Fasilitas</label>
                                <table width="100%" ">
                                    <tr>
                                        <td>
                                            <div class="input-group" >
                                                <input type="hidden" name="fasilitas_id[]" class="autocomplete form-control" id="v_id[]" placeholder="Fasilitas" required />
                                                <input type="search" name="fasilitas_nama[]" class="autocomplete form-control" id="autocomplete1" placeholder="Nama"/>

                                                <div class="input-group-btn">
                                                  <button type="button" class="btn bg-green btn-flat" id="tambah" ><span class="glyphicon glyphicon-plus"></span></button>
                                                </div>
                                            </div>
                                        </td>
                            
                                        <td>
                                            <input type="text" name="fasilitas_harga[]" class="autocomplete[] form-control" id="v_harga[]" placeholder="Harga" readonly />
                                        </td>
                                         <td>
                                            <input type="number" name="qty[]" class="form-control" placeholder="Qty" min="1" required />

                                        </td>
                                        <td>
                                            <input type="text" name="totalf[]" id="fasilitas_id[]" class="form-control" placeholder="Total Harga" readonly />
                                        </td>
                                    </tr>
                                </table>

                            </div> -->
            
                            
                        <div class="modal-footer">
                            <a href="<?php echo base_Url('admin/dtbc')?>"  class="btn btn-warning "  >Kembali
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function(){
    $("#tambah").click(function(){
        $("#fas").append('<p><table width="100%" id="isi">'+
                                '<tr><td><div class="input-group" >'+
                                            '<input type="hidden" name="fasilitas_id[]" class="autocomplete form-control" id="v_id[]" placeholder="Fasilitas" required />'+
                                            '<input type="search" name="fasilitas_nama[]" class="autocomplete form-control" id="autocomplete[]" placeholder="Nama" />'+
                                                '<div class="input-group-btn">'+
                                                    '<button type="button" class="btn bg-red btn-flat" id="hapus" >'+
                                                        '<span class="glyphicon glyphicon-minus"></span>'+
                                                    '</button>'+
                                                '</div>'+
                                        '</div></td>'+
                                    '<td><input type="text" name="fasilitas_harga[]" class="autocomplete form-control" id="v_harga[]" placeholder="Harga" readonly /></td>'+
                                    '<td><input type="number" name="qty[]" class="form-control" placeholder="Qty" required /></td>'+
                                    '<td><input type="text" name="totalf[]" class="form-control" placeholder="Total Harga" readonly /></td>'+
                            '</tr>'+
                        '</table></p>');
        return false;
    });

    $("#hapus").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents("#isi").fadeOut();
                        $(this).parents("$isi").remove();
            }
            });

});
</script> -->
<script type="text/javascript">

    $(document).ready(function(){
        
        $("#btn").click(function(){
            $(this).hide();
        })
    });
</script> 