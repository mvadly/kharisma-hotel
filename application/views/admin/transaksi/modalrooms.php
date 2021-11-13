<div id="carirooms" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cari rooms</h4>
            </div><br/>
<table id="table2" class="table penelitian table-bordered table-striped" width="100%">
    <thead>     
        <tr>
            <th>Kode rooms</th>
            <th>Jumlah Kamar</th>
            <th>Lantai</th>
            <th>Harga Sewa</th>
          <th>Aksi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($dataCT as $data){?>
            <tr>
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['jml_kamar']; ?></td>
            <td><?php echo $data['lantai']; ?></td>
            <td align="right"><?php echo 'Rp. '.number_format($data['hargasewa']).',00'; ?></td>
                        <td class="text-center">
                        <button type="button" id="rooms<?php echo $data['kode_rooms']?>" data-dismiss="modal" class="btn btn-next" style="float: left;">Pilih</button>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
     </div>
    </div>
</div>