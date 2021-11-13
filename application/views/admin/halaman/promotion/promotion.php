<div class="page-header">
    <h2>Promotion</h2>
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
            <th>ID Promosi</th>
            <th>Judul Promosi</th>
            <th>Tanggal Posting</th>
            <th>Gambar</th>
        	
            <th>Opsi</th>
        </tr>
    </thead>


    <tbody>
        <?php
        foreach ($promosi as $data){

        ?>
        <tr>
            <td><?php echo $data['id_prm']; ?></td>
            <td><?php echo $data['title_prm']; ?></td>
            <td><?php echo $data['tgl_post']; ?></td> 
            <td width="100"><img class="thumbnail img-responsive" src="<?php echo base_url('assets/upload/promotion/'.$data['gambar']); ?>"</td>
        	      	  
            <td class="text-center">
            <a class="btn bg-red" href="<?php echo base_url('admin/promotion/hapus_data/'.$data['id_prm'])?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="Hapus Data"><span class="fa fa-trash"></span></a>
            </td>
                                
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>  


<?php //if ($ses_level != 'Front Office' and $ses_level != 'Manager'){
$this->load->view('admin/halaman/promotion/tambah');
// } ?>




