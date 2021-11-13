<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Kode rooms</th>
        <th>Nama rooms</th>
        <th>Jumlah Kamar</th>
        <th>Lantai</th>
        <th>Status rooms</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($datact as $data){
            $status = $data['status'];
            if ($status ==1) {
                $status ='Terisi';
            }else if ($status ==2){
                    $status ='Booking';
                }else if ($status == 3){
                    $status ='Repairing';
                    }else{
                            $status ='Kosong';
                        }

    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['jml_kamar']; ?></td>
            <td><?php echo $data['lantai']; ?></td>
            <td><?php echo $data['hargasewa']; ?></td>
            <td><?php echo $status; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
