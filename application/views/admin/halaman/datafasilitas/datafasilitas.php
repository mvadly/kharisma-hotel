<div class="page-header">
    <h2>Master Data <small>Data Fasilitas</small></h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Data
                <a href="#widget1" data-toggle="collapse"><span class="fa fa-chevron-down" style="float: right"></span>
                </a>
            </div>
            <div id="widget1" class="panel-body collapse in">
                <?php $this->load->view('fm') ?>
                <div class="nav" style="margin-bottom: 10px">
                        <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                            <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Tambah Data</span>
                            </button>
                        <?php } ?>

                    </div>
<table id="table" class="table penelitian table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th>ID Fasilitas</th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
    </thead>

            <tbody>
            <?php
            foreach ($fasilitas->result_array() as $data){
            $id_fasilitas=$data['id_fasilitas'];
            $nama_fasilitas=$data['nama_fasilitas'];
            $harga=$data['harga'];
            $ket_fasilitas=$data['ket_fasilitas'];
            $id_gambar=$data['id_gambar'];

            ?>
            <tr>
            <td><?php echo $id_fasilitas; ?></td>
            <td><?php echo $nama_fasilitas; ?></td>
        	<td align="right"><?php echo 'Rp. '.number_format($harga).',00'; ?></td> 
             <td><?php echo $ket_fasilitas; ?></td>     	  
            <td class="text-center">


                                    <a class="btn bg-yellow" href="<?php echo base_url('admin/dfasilitas/edit_data/').$id_fasilitas;?>" data-toggle="tooltip" title="Edit Data" data-placement ="top" ><span class="glyphicon glyphicon-edit" ></span></a>

                                    <a class="btn bg-green" href="<?php echo base_url('admin/dfasilitas/tambah_gambar/'.$id_gambar);?>" data-toggle="tooltip" data-placement ="top" title="Tambah Gambar"><span class="glyphicon glyphicon-plus" ></span></a>

                                    <a class="btn bg-red" href="<?php echo base_url()?>admin/dfasilitas/hapus_data/<?php echo $data['id_fasilitas'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="glyphicon glyphicon-trash" ></span></a>

                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div> 
<?php $this->load->view('admin/halaman/datafasilitas/tambah');?> 
<!-- <?php $this->load->view('admin/halaman/datafasilitas/edit');?> -->








