<?php $this->load->view('umum/header.php');?>

<div class="container">
<div class="row" style="padding: 20px 20px";>
<div style="background: white; padding: 20px 20px 20px 20px; border-radius: 10px;">

       <h1 class="title">Facilities</h1>
       <div class="row">
              <div id="templatemo_content">
    <div class="col_w620_w2col col_last">

        <div id="content" style="padding: 20px 20px 20px 20px";>
           <table class="table penelitian table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th>No. </th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Keterangan</th>
        </tr>
    </thead>

            <tbody>
            <?php $no=0;
            foreach  ($fasilitas->result_array() as $data){ $no++;

            $nama_fasilitas=$data['nama_fasilitas'];
            $harga=$data['harga'];
            $ket_fasilitas=$data['ket_fasilitas'];

            ?>
            <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $nama_fasilitas; ?></td>
        	<td align="right"><?php echo 'Rp. '.number_format($harga).',00'; ?></td> 
             <td><?php echo $ket_fasilitas; ?></td>     	  

                                <?php } ?>
        </tr>
        
    </tbody>
</table>
        </div>
        
    </div>

    <div class="cleaner"></div>
</div>            
       </div>






</div>
</div>
</div>
<?php include 'footer.php';?>