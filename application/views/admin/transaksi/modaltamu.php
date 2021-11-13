<div id="caritamu" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cari Tamu</h4>
            </div><br/>
<table id="table" class="table penelitian table-bordered table-striped" width="100%" >
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Kode Tamu</th>
                    <th>No. Identitas</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>

                    <th class="text-center">Aksi<br/></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0; foreach ($datatamu as $data){ $no++
                        ?>
                        <tr>
                        <td><?php echo $no.'.'; ?></td>
                        <td><?php echo $data['kode_tamu']; ?></td>
                        <td><?php echo $data['no_id']; ?></td>
                        <td><?php echo $data['nama_tamu']; ?></td>
                        <td><?php echo $data['jeniskelamin']; ?></td>
                        <td class="text-center">
                        <button type="button" id="tamu<?php echo $data['kode_tamu']?>" data-dismiss="modal" class="btn btn-next" style="float: left;">Pilih</button>
                        </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
     </div>
    </div>
</div>