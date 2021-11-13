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
    <h2>Data Check In</h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Fasilitas
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
                    <?php
                    $data=$this->session->flashdata('error');
                    if($data!=""){ ?>
                        <div id="pesan-flash">
                            <div class='alert alert-danger alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Error! </strong> <?=$data;?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data2=$this->session->flashdata('sukses');
                    if($data2!=""){ ?>
                        <div id="pesan-error-flash">
                            <div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Succes! </strong> <?=$data2;?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $data3=$this->session->flashdata('warning');
                    if($data3!=""){ ?>
                        <div id="pesan-error-flash">
                            <div class='alert alert-warning alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong> Warning! </strong> <?=$data3;?>
                            </div>
                        </div>
                    <?php }  ?>


                    <form action="<?php echo site_url('admin/dcheckinkh/simpan_data')?>" enctype="multipart/form-data" method="post">

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Sewa</label>
                                <input type="text" name="kode_sewa" class="form-control" value="<?php echo $kode_sewa;?>" readonly/>
                                
                            </div>
                            <div class="form-group">
                                <label>Kode Tamu</label>
                                <input type="text" name="kode_tamu" class="form-control" value="<?php echo $kode_tamu;?>" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran</label>
                                <input type="number" name="bayar" class="form-control" value="<?php echo $bayar;?>" readonly/>
                            </div>
                           <!--  <div class="form-group">
                              <label>Select Multiple</label>
                              <select multiple="" class="form-control">
                              <?php foreach ($dfas as $key) {?>
                                <option><?php echo $key['nama_fasilitas'] ?></option>
                              <?php } ?>
                            
                              </select>
                            </div> -->
                            <label>Fasilitas Terpilih</label>
                            <?php $this->load->view('admin/halaman/datacekin/fasilitasterpilih') ?>
                            <div ng-app="">

                            <label>Fasilitas</label>
                            
                              <ul class="todo-list">
                                <?php foreach ($dfas as $key) {?>
                                <li>
                                 
                                  <input  id="idfas_<?php echo $key['id_fasilitas']; ?>" name="id_fasilitas[]" type="checkbox" ng-model="myVar<?php echo $key['id_fasilitas']; ?>" ng-init="myVar<?php echo $key['id_fasilitas']; ?>" value="<?php echo $key['id_fasilitas']; ?>" >
                                  
                                  <span class="text"><?php echo $key['nama_fasilitas'] ?></span>
                                  <div  ng-if="myVar<?php echo $key['id_fasilitas']; ?>">
                                  <table width="100%" ">
                                    <tr>

                                        <td>

                                            <input type="text" name="harga[]" id="h_<?php echo $key['id_fasilitas'] ?>" class="form-control"   value="<?php echo $key['harga'] ?>"  readonly />
                                        </td>
                                         <td>
                                            <input type="number" name="qty[]" id="q_<?php echo $key['id_fasilitas'] ?>" class="form-control" placeholder="Qty" min="1" required />

                                        </td>

                                    </tr>
                                </table>
                                </div>
                                  

                                </li>
                                <?php }?>
                              </ul>
                            </div>
       
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
                            <button type="reset" class="btn btn-danger ">Reset</button>
                            <button type="button" class="btn btn-warning " data-dismiss="modal" onclick="history.back();">Batal
                            </button>
                            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
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