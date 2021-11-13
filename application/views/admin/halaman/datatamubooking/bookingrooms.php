<div class="page-header">
    <h2>Booking <small>Rooms</small></h2>
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
            <?php $this->load->View('fm') ?>
            <table id="table" class="table penelitian table-bordered table-striped" width="100%">
            	<thead>   	
                    <tr>
                        <th>ID Booking</th>
                        <th>No. Identitas</th>
                        <th>Nama Tamu</th>
                        <th>Kode Rooms</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th class="text-center">Pilihan<br/></th>
                    </tr>
                </thead>
                <tfoot>     
                    <tr>
                        <th>ID Booking</th>
                        <th>No. Identitas</th>
                        <th>Nama Tamu</th>
                        <th>Kode Rooms</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Tipe</th>
                        <th>Status</th>
                    </tr>
                </tfoot>

                        <tbody>
                        <?php
                        foreach ($datatb as $data){
                        $status=$data['status_ci'];
                        $label='default';
                        if ($status=='checkin') {
                            $label='primary';
                        }else if ($status=='booked') {
                            $label='success';    
                        }else if ($status=='rejected') {
                            $label='danger';
                        }else if ($status=='done') {
                            $label='info';
                        }
                        ?>
                        <tr>
                        <td><?php echo $data['id_books']; ?></td>
                        <td><?php echo $data['no_id']; ?></td>
                        <td><?php echo $data['nama_tamu']; ?></td>
                        <td><?php echo $data['kode_rooms']; ?></td>
                        <td><?php echo $data['tgl_masuk']; ?></td>
                        <td><?php echo $data['tgl_keluar']; ?></td>
                        <td><?php echo $data['tipe']; ?></td>
                        <!-- <td align="right"><?php echo 'Rp. '.number_format($data['total_harga_sewa']/2).',00'; ?></td>   -->  
                        <td  class="text-center label-<?php echo $label ?>" id="stts<?php echo $data['id_books']; ?>"><?php echo ucfirst($status); ?></td> 

                        <td width="200" class="text-center">
                                                      
                             <div class="btn-group">
                              <button type="button" class="btn btn-<?php echo $label ?> " data-toggle="dropdown"><span class="fa fa-gear"></span>
                              <button type="button" class="btn btn-<?php echo $label ?> dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
                              </button>

                              <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url('admin/dtbc/detail_data/'.$data['id_books']) ;?>"><i class="fa fa-info"></i> Detail</a></li>

                                <?php if (($data['status_ci']!='rejected') AND ($data['status_ci']!='done') AND ($data['status_ci']!='unverified') ) { ?>
                                <li><a href="javascript:void" data-target="#modalbct<?php echo $data['id_books']?>" data-toggle="modal"><i class="fa fa-edit"></i> Update</a></a></li>
                                <?php } 

                                if ($data['status_ci']=='checkin') { ?>
                                <li><a href="<?php echo base_url('admin/dtbc/checkout/'.$data['id_books']) ;?>" ><i class="fa fa-check" ></i> Check Out</a></li>

                                <li><a href="<?php echo base_url('admin/dtbc/tambah_f/'.$data['id_books']) ;?>" ><i class="fa fa-plus-square" ></i> Fasilitas</a></li>
                                <?php } ?>

                                <li><a href="<?php echo base_url('admin/dtbc/hapus_data/'.$data['id_books']) ;?>" onclick="return confirm('Yakin data dihapus')" ><i class="fa fa-trash" ></i> Hapus</a></li>
                              </ul>
                              
                            </div>
                            <?php if ($data['status_ci']=='checkin' || $data['status_ci']=='done') {?>
                            <div class="btn-group">
                              <button type="button" class="btn btn-<?php echo $label ?> dropdown-toggle" data-toggle="dropdown"><span class="fa fa-print"></span>
                              </button>
                              
                              <button type="button" class="btn btn-<?php echo $label ?> dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                              <?php if ($data['status_ci']=='checkin') { ?>
                                <li><a href="<?php echo base_url('admin/dtbc/cetak_cekin/'.$data['id_books']) ?>" target="_blank"><span class="fa fa-print"></span> Check In
                              </a></li>
                              <?php } 

                              if ($data['status_ci']=='done') { ?>
                                <li><a href="<?php echo base_url('admin/dtbc/cetak_co/'.$data['id_books']) ?>" target="_blank" ><span class="fa fa-print"></span> Check Out
                              </a></li>
                              <?php } ?>
                              </ul>
                            </div>
                           <?php } ?>

                                                

                        </td>



                        <?php } ?>
                    </tr>
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/halaman/datatamubooking/tambah_ci') ?>




