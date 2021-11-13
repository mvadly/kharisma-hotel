
<style type="text/css">
	.paneltrans{
		display: inline-table;
        width: 320px;
        margin: 3px;
	}
    .width{
        max-width: 897px;
        display: inline-table;
        margin-right: 5px;
    }
    .tombol{
        margin-top: -3px;
        display: inline-table;
        height: 32px;
    }
    .to{
        width: 200px;
    }
</style>
<script>
    $(document).ready(function(){
      <?php foreach ($datatamu as $data) {
        
        ?>
      $("#tamu<?php echo $data['kode_tamu']?>").click(function(){
            $("#kode_tamu").val('<?php echo $data['kode_tamu']?>');
            $("#ni").val('<?php echo $data['no_id']?>');
            $("#nt").val('<?php echo $data['nama_tamu']?>');
            $("#jkel").val('<?php echo $data['jeniskelamin']?>');
            $("#no_telp").val('<?php echo $data['no_telp']?>');
            $("#warganegara").val('<?php echo $data['warganegara']?>');


      });
      
      <?php } ?>   

      <?php foreach ($dataCT as $data) {
        
        ?>
      $("#rooms<?php echo $data['kode_rooms']?>").click(function(){
            $("#kode_rooms").val('<?php echo $data['kode_rooms']?>');
            $("#jk").val('<?php echo $data['jml_kamar']?>');
            $("#hs").val('<?php echo $data['hargasewa']?>');
            $("#pembayaran").val(<?php echo $data['hargasewa']?>*$("#lama").val());



      });
      
      <?php } ?> 



      

    });

   function addText(){
        var ps=document.getElementById('pilihsewa').value;

             if (ps=='rooms') {
                    $('#tgh').show(500);
                    $('#trooms,#ctg').show();
                    $('#kmr,#tkamar').hide(500);
                    $('#kode_kamar,#nc,#jk,#hs').val('');

                }else{
                    $('#tgh').show(500);
                    $('#tkamar,#kmr').show();
                    $('#trooms,#ctg').hide(500);
                    $('#kode_rooms,#nbh,#lt,#hsk').val('');
                } 

}
</script>
<div class="page-header">
    <h2>Transaksi</h2>
</div>
<div class="row" >
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-primary" >
            <div class="panel-heading ">
                
            </div>
            <div id="widget1" class="panel-body collapse in">
                <?php $this->load->view('fm')  ?>
                <div style="padding: 20px; background: rgba(0,0,0,0.1);">
<form action="transoff/simpan_data" method="post">
    <div class="form-group">
    <label>Kode Tamu</label>
        <div class="input-group date" >
            <input type="text" name="kode_tamu" id="kode_tamu" placeholder="Kode Tamu"  class="form-control" required> 
            <span class="input-group-addon" data-toggle="modal" data-target="#caritamu"><span class="glyphicon-search glyphicon" ></span></span>
        </div>
    
    </div>

    <?php $this->load->view('admin/transaksi/tgl') ?>
    <div class="form-group">
    <label>Adult</label>
        <input type="number" min="1" name="adult" class="form-control" placeholder="Dewasa" />
    </div>
    
    <div class="form-group">
    <label>Child</label>
        <input type="number" min="1" name="child" class="form-control" placeholder="Anak-anak" />
    </div>  

    <div class="form-group" id="trooms">
    <label>Kode Rooms</label>
        <div class="input-group date" >
            <input type="text" name="kode_rooms" id="kode_rooms" placeholder="Kode rooms"  class="form-control" > 
            <span class="input-group-addon" data-toggle="modal" data-target="#carirooms"><span class="glyphicon-search glyphicon" ></span></span>
        </div>
    
    </div>

    <div class="form-group">
    <label>Pilih Tipe</label>
        <select id="pilihsewa" class="form-control"  onchange="">
            <option disabled selected>Pilih Tipe</option>
            <?php foreach ($tipe as $k) {
                echo '<option value="'.$k['id_tb'].'">'.$k['tipe_bayar'].'</option>';
            } ?>
            
        </select>
    </div>
    
</div><br/>
<div style="padding: 20px; background: rgba(0,0,0,0.1);">
  <div class="row">
    <div class="col-sm-4" ><?php $this->load->view('admin/transaksi/tamu');?></div>
    <div class="col-sm-4" id="tgh"><?php $this->load->view('admin/transaksi/rooms');?></div>
    <div class="col-sm-4" ><?php $this->load->view('admin/transaksi/bayar');?></div>
  </div>


</form>
</div>
</div>
</div>
</div>
<?php 
$this->load->view('admin/transaksi/modaltamu'); 
$this->load->view('admin/transaksi/modalrooms'); 


?>






  <script type="text/javascript">    
    	
    	

    	function tesbayar(){
    		var tb = document.getElementById("pembayaran");
    		var vbayar = document.getElementById("bayar");
    		var vkembali = document.getElementById("kembali");
    		vkembali.value =parseInt(vbayar.value)-parseInt(tb.value);
    		if (vkembali.value < 0) {
    			alert('pembayaran kurang');
    			vkembali.value=0;
    			vbayar.value=0;

    		}
    		
    		

    	}
    	




    
    </script>
