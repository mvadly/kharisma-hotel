
<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Nama Fasilitas</th>
        <th>Harga</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($dfas as $data){
          
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['nama_fasilitas']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['ket_fasilitas']; ?></td>

    
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
