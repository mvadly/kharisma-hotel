<div class="page-header">
    <h2>Master Data <small>Data Tamu</small></h2>
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

                        <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                            <span class="glyphicon glyphicon-plus"></span>
                            <span>Tambah Data</span>
                        </button>

                </div>
                <table id="table" class="table penelitian table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Kode Tamu</th>
                    <th>No. Identitas</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Warga Negara</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>
                    <th class="text-center">Aksi<br/></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>No.</th>
                    <th>Kode Tamu</th>
                    <th>No. Identitas</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Warga Negara</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>

                    </tr>
                    </tfoot>
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
            
                        <td><?php echo $data['warganegara']; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($data['tgl_lahir'])); ?></td>
                        <td><?php echo $data['tipetamu']; ?></td>
                        <td class="text-center" width="100">
                                    

                                    
                                    <a class="btn bg-yellow" href="<?php echo base_url()?>admin/dtamu/edit_data/<?php echo $data['kode_tamu'];?>" data-toggle="tooltip" data-placement ="top" title="edit"><span class="fa fa-edit"></span></a>
                                    <a class="btn bg-red" href="<?php echo base_url()?>admin/dtamu/hapus_data/<?php echo $data['kode_tamu'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="hapus"><span class="fa fa-trash"></span></a>

                                </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php $this->load->view('admin/halaman/datatamu/tambah');?>