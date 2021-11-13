<div class="page-header">
    <h2>Data Fasilitas <small><?php echo $id_gambar ?></small></h2>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
              <!-- Info box -->
  
                  <!-- <h3 class="box-title">Tambah Gambar</h3>
                  <div class="box-tools pull-right">Kode Cottage
                    <div class="label bg-aqua"><?php echo $kode_cottage ?></div>
                  </div> -->
  
                <div class="box-body" >
                  <?php $this->load->view('admin/halaman/upload_view')?><br>
                        <div class="form-group">
                         <input type="hidden" class="form-control" name="id_gambar" value="<?php echo $id_gambar ?>">
                         <?php foreach ($datagambar->GetDataGambar('where id_gambar="'.$id_gambar.'" order by id_gambar asc')->result_array() as $data) {?>
    
                          <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="<?php echo base_url('assets/upload/gambar/').$data['gambar']; ?>" data-gallery>
                                <img src="<?php echo base_url('assets/upload/gambar/').$data['gambar']; ?>" alt ="<?php echo $data['gambar']?>" class="img-responsive " style="min-height: 150px;max-height: 150px;" ></a>
                                <div class="caption">
                                  <a href="<?php echo base_url('admin/dfasilitas/hapus_gambar/'.$data['id_g']) ?>" class="btn bg-red form-control">Hapus</a>
                                </div>

                            </div>
                          </div>

                        <?php }?>
                        </div>
               

  </div>
</div>


  