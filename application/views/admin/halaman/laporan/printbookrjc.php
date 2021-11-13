
<p>Dari Tanggal <?php echo $dari ?> sampai Tanggal <?php echo $ke ?></p>

<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Nama Tamu</th>
        <th>Kode Room</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($databooking as $data){?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['tgl_masuk']; ?></td>
            <td><?php echo $data['tgl_keluar']; ?></td>

    
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
