
<p>Dari Tanggal <?php echo $dari ?> sampai Tanggal <?php echo $ke ?></p>

<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>ID Booking</th>
        <th>Nama Tamu</th>
        <th>Kode Room</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Harga Sewa</th>
        <th>Tipe Booking</th>
        <th>Biaya Sewa Room</th>
        <th>Biaya Fasilitas</th>
        <th>Total Sewa</th>
    </tr>
    </thead>
    <?php $no=1; $totals=0; foreach ($datacekin as $data){
        $masuk = $data['tgl_masuk'];
        $keluar = $data['tgl_keluar'];
        $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));
        $ths= $lama*$data['hargasewa']+$data['nominal']; 

        ?>
    <tbody>
    

        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['id_books']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            <td><?php echo $data['tgl_keluar']; ?></td>
            <td align="right"><?php echo  number_format($data['hargasewa']+$data['nominal']); ?></td>
            <td><?php echo $data['tipe'] ?></td>
            
            <td align="right"><?php echo  number_format($ths); ?></td>
            <td align="right">

                <?php 
               
                    $i=1; 
                    $grandtotal=0; 
                    
                    foreach($fakturci->GetDetailCi("where id_detail_f='".$data['detail_f']."'")->result_array() as $data) { 
                    $grandtotal += $data['totalf'];
                    
                    $i++;}  
                    $totals += $ths+$grandtotal;

                    echo number_format($grandtotal);
                ?>
            </td>
            <td align="right"><?php echo  number_format($ths+$grandtotal); ?></td>

    
        </tr>
       
    </tbody>
    
     
      <?php $no++;}  ?>
      <tfoot>
         <tr>
             <th colspan="9" align="center">Total</th>
             <th align="right"><?php  echo  number_format($totals);   ?></th>
         </tr>
     </tfoot>
</table>
