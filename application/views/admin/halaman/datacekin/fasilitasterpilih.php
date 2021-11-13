<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
tfoot{

    font-weight: bolder;
   
}
</style>
<div class="table-responsive">
                             
                            <table class="table"  align="center" width="100%">
                            <thead>

                            <tr>
                                <th>No. </th>
                                <th>Nama Fasilitas</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th >Total</th>
                                <th >Opsi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php 
                            $isi=$fakturci->num_rows();
                            if ($isi <=0){?>
                            <tr>
                                <td colspan="4" align="center">Fasilitas tidak ada</td>
                                <td  align="right">0</td>
                            </tr>
                            <?php }else{?>
                            <?php 
                            $i=1; 
                            $grandtotal=0;
                            foreach($fakturci->result_array() as $row) { 
                            $grandtotal += $row['totalf']; ?>
                            
                                <tr>
                                    <td align="center"><?php echo $i; ?></td>
                                    <td align="center"><?php echo $row['nama_fasilitas']; ?></td>
                                    <td align="right"><?php echo $row['harga']; ?></td>
                                    <td align="center"><?php echo $row['qty']; ?></td>
                                    <td align="right"><?php echo $row['totalf'] ?></td>
                                    <td align="center">
                                    <a href="<?php echo base_url('admin/dcheckinct/hapus_f/'.$row['id']) ;?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus" class="btn btn-danger"><span class="fa fa-trash" style="font-size: 12pt"></span></a>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody> 
                            <tfoot>
                
                                <td colspan="4" align="center">Total</td>
                                <td><?php echo $grandtotal ?></td>
                                <td></td>
                                <?php } ?>
                            </tfoot>
                            </table>
                            </div>