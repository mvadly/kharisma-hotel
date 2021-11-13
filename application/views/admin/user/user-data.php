<?php
$ses_level = $this->session->userdata('ses_level');
?>
    <div class="page-header">
        <h2>Data User</h2>
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
                    <?php $this->load->view("fm") ?>
                    <div class="nav" style="margin-bottom: 10px">

                            <button data-toggle="modal" data-target="#data-tambah" class="btn btn-info col-md-2">
                                <span class="glyphicon glyphicon-plus"></span>
                                <span>Tambah Data</span>
                            </button>

                        
                    </div>
                    <table id="table" class="table penelitian table-bordered table-striped" width="100%">
                        <thead>
                        <tr>
                            <th width="7%">#</th>
                            <th>NAMA USER</th>
                            <th>LEVEL</th>
                            <th>EMAIL</th>
                            <th>LOGIN TERAKHIR</th>
                                <th class="text-center">Opsi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>nama_user</th>
                            <th>level</th>
                            <th>email</th>
                            <th>last_login</th>
                                <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $no = 0; foreach ($data_user as $data){ $no++
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data['nama_user']?></td>
                                <td><?php echo $data['level']?></td>
                                <td><?php echo $data['email']?></td>
                                <td><?php echo $data['last_login']?></td>

                                    <td class="text-center">
                                        <a class="btn bg-green" href="<?php echo base_url()?>admin/user/detail_data/<?php echo $data['id_user'];?>" data-toggle="tooltip" data-placement ="top" title="detail"><span class="fa fa-info" ></span></a>

                                        <a class="btn bg-yellow" href="<?php echo base_url()?>admin/user/edit_data/<?php echo $data['id_user'];?>" data-toggle="tooltip" data-placement ="top" title="edit"><span class="fa fa-edit "></span></a>
                                        <a class="btn bg-red" href="<?php echo base_url()?>admin/user/hapus_data/<?php echo $data['id_user'];?>" onclick="return confirm('Yakin data dihapus')" data-toggle="tooltip" data-placement ="top" title="hapus"><span class="fa fa-trash"></span></a>

                                    </td>

                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/user/user-tambah');?>