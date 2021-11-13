
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
        <th>Lama</th>
        <th>Harga Sewa</th>
        <th>Tipe Booking</th>
        
        <th>Total Harga Sewa</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($datacekin as $data){
        $masuk = $data['tgl_masuk'];
        $keluar = $data['tgl_keluar'];
        $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['id_books']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            <td><?php echo $data['tgl_keluar']; ?></td>
            <td><?php echo $lama; ?> Hari</td>
            <td><?php echo number_format($data['hargasewa']+$data['nominal']); ?></td>
            <td><?php  echo $data['tipe'] ?></td>
            
            <td><?php echo number_format($lama*($data['hargasewa']+$data['nominal'])); ?></td>

    
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
