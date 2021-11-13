<div class="page-header">
    <h2>Data Check In <small>Cottage</small></h2>
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
                <?php
                $data=$this->session->flashdata('error');
                if($data!=""){ ?>
                    <div id="pesan-flash">
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Error! </strong> <?=$data;?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $data2=$this->session->flashdata('sukses');
                if($data2!=""){ ?>
                    <div id="pesan-error-flash">
                        <div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Succes! </strong> <?=$data2;?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $data3=$this->session->flashdata('warning');
                if($data3!=""){ ?>
                    <div id="pesan-error-flash">
                        <div class='alert alert-warning alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <strong> Warning! </strong> <?=$data3;?>
                        </div>
                    </div>
                <?php } ?>


<table id="table" class="table table-bordered table-striped" width="100%">
	<thead>   	
        <tr>
            <th width="0">Kode Sewa</th>
            <th>Kode Tamu</th>
            <th>Nama Tamu</th>
            <th>Kode Cottage</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th width="0">Lama</th>


            <th class="text-center" width="100">Opsi<br></th>
        </tr>
    </thead>
    <tfoot>     
        <tr>
            <th>Kode Sewa</th>
            <th>Kode Tamu</th>
            <th>Nama Tamu</th>
            <th>Kode Cottage</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Lama</th>

            </tr>
    </tfoot>
            <tbody>
            <?php
            foreach ($dataCICT as $data){
                $masuk = $data['tgl_masuk'];
                $keluar = $data['tgl_keluar'];
                $lama = ((abs(strtotime($keluar)-strtotime($masuk)))/(60*60*24));

                
            ?>
            <tr>
            <td><?php echo $data['kode_sewa']; ?></td>
            <td><?php echo $data['kode_tamu']; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_cottage']; ?></td>
            <td><?php echo date('d-m-Y',strtotime($masuk)); ?></td>
            <td><?php echo date('d-m-Y',strtotime($keluar)); ?></td>
            <td><?php echo $lama ?></td>
	  
            <td class="text-center" width="250">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>

                                    <a href="<?php echo base_url()?>admin/dcheckinCT/detail_data/<?php echo $data['kode_sewa'];?>" data-toggle="tooltip" data-placement ="top" title="Detail" class="btn bg-green"><span class="fa fa-info" style="font-size: 14pt"></span></a>

                                    <a href="<?php echo base_url()?>admin/dcheckinCT/tambah_f/<?php echo $data['kode_sewa'];?>" data-toggle="tooltip" data-placement ="top" title="Tambah Fasilitas" class="btn bg-yellow" ><span class="fa fa-plus-square-o" style="font-size: 14pt"></span></a>
                                    
                                    <a data-target="#modaltci<?php echo $data['kode_sewa']?>" data-toggle="modal" title="Tambah Jadwal Check In" class="btn bg-blue"><span class="fa fa-hotel" style="font-size: 14pt"></span></a>

                                    <a href="<?php echo base_url()?>admin/dcheckinCT/cetak_cekin/<?php echo $data['kode_sewa'];?>" data-toggle="tooltip" data-placement ="top" title="Cetak Faktur Check In" class="btn bg-green"><span class="fa fa-print" style="font-size: 14pt"></span></a>

                                    
                                    <!-- <a href="<?php echo base_url('admin/dcheckinCT/hapus_data/'.$data["kode_sewa"]);?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus" class="btn bg-red"><span class="fa fa-trash" style="font-size: 12pt"></span></a> -->
                                    <?php } ?>
                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div>  
<?php $this->load->view('admin/halaman/datacekin/tambah_ci') ?>




