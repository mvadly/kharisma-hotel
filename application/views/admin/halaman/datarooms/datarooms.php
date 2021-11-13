<div class="page-header">
    <h2>Master Data <small>Data Rooms</small></h2>
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
            <th>Kode Rooms</th>
            <th>Jumlah Kamar</th>
            <th>Lantai</th>
        	<th>Harga Sewa</th>
            <th>Status</th>
          <th>Opsi</th>
        </tr>
    </thead>


            <tbody>
            <?php
            foreach ($dataCT as $data){
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
            <td><?php echo $data['kode_rooms']; ?></td>
            <td><?php echo $data['jml_kamar']; ?></td>
            <td><?php echo $data['lantai']; ?></td>
        	<td align="right"><?php echo 'Rp. '.number_format($data['hargasewa']).',00'; ?></td>
        	<td><?php echo $status; ?></td>       	  
            <td class="text-center">
                                    <?php if ($ses_level != 'Admin' and $ses_level != 'Super Admin'){?>
                                    
                                    <?php } ?>
                                    <?php if ($ses_level != 'Pimpinan' and $ses_level != 'Pengunjung'){?>
                                    <a class="btn bg-yellow" href="<?php echo base_url()?>admin/drooms/edit_data/<?php echo $data['kode_rooms'];?>" data-toggle="tooltip" data-placement ="top" title="Edit Data"><span class="fa fa-edit"></span></a>
                                    <a class="btn bg-green" href="<?php echo base_url()?>admin/drooms/tambah_gambar/<?php echo $data['id_gambar'];?>" data-toggle="tooltip" data-placement ="top" title="Tambah Gambar"><span class="fa fa-plus "></span></a>
                                   
                                    <a class="btn bg-red" href="<?php echo base_url()?>admin/drooms/hapus_data/<?php echo $data['kode_rooms'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="fa fa-trash"></span></a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
        </tr>
        
    </tbody>
</table>
</div>
</div>  


<?php //if ($ses_level != 'Front Office' and $ses_level != 'Manager'){
$this->load->view('admin/halaman/datarooms/tambah');
// } ?>




