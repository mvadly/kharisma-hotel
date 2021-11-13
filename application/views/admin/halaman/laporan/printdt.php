
<table border="1" align="center" width="100%">
    <thead>
    
    <tr>
        <th>No. </th>
        <th>Kode Tamu</th>
        <th>No. Identitas</th>
        <th>Nama Tamu</th>
        <th>Jenis Kelamin</th>
        <th>Warga Negara</th>
        <th>Tanggal Lahir</th>
        <th>No. Hp</th>
        <th>E-Mail</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach ($dtamu as $data){
          
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['kode_tamu']; ?></td>
            <td><?php echo $data['no_id']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['jeniskelamin']; ?></td>
            <td><?php echo $data['warganegara']; ?></td>
            <td><?php echo $data['tgl_lahir']; ?></td>
            <td><?php echo $data['no_telp']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['tipetamu']; ?></td>
    
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
