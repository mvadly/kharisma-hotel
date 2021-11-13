<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Autocomplete | AZZURA Media</title>


    <!-- Memanggil file .js untuk proses autocomplete -->
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.0.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
    <link href='<?php echo base_url();?>assets/css/default.css' rel='stylesheet' />

    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/autocomplete/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#v_id').val(''+suggestion.id_fasilitas); // membuat id 'v_nim' untuk ditampilkan
                    $('#v_harga').val(''+suggestion.harga); // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>


</head>
<body>


<div id="content">
<h1>Autocomplete</h1>
<form action="<?php echo site_url('admin/c_admin/add_orders'); ?>" method="post">
    <div class="wrap">
    <table>
        <tr>
            <td><small>Nama Fasilita:</small><br><input type="search" class='autocomplete nama' id="autocomplete1" name="nama_customer"/></td>
        </tr>
        <tr>
            <td><small>ID Fasilitas :</small><br><input type="text" class='autocomplete' id="v_id" name="nama_customer"/></td>
        </tr>
        <tr>
            <td><small>Harga :</small><br><input type="text" class='autocomplete' id="v_harga" name="nama_customer"/></td>
        </tr>
    </div>
</form>
</div>


</body>
</html>