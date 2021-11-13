
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Fasilitas</h4>
            </div>
            <div class="modal-body">
            <div ng-app="">

                    <ul class="todo-list">
                      <?php foreach ($dfas as $key) {?>
                      <li>
                       
                        <input  id="idfas_<?php echo $key['id_fasilitas']; ?>" name="id_fasilitas[]" type="checkbox" ng-model="myVar<?php echo $key['id_fasilitas']; ?>" ng-init="myVar<?php echo $key['id_fasilitas']; ?>" value="<?php echo $key['id_fasilitas']; ?>" >
                        
                        <span class="text"><?php echo $key['nama_fasilitas'] ?></span>
                        <div  ng-if="myVar<?php echo $key['id_fasilitas']; ?>">
                        <table width="100%" ">
                          <tr>

                              <td>

                                  <input type="text" name="harga[]" id="h_<?php echo $key['id_fasilitas'] ?>" class="form-control"   value="<?php echo $key['harga'] ?>"  readonly />
                              </td>
                               <td>
                                  <input type="number" name="qty[]" id="q_<?php echo $key['id_fasilitas'] ?>" class="form-control" placeholder="Qty" min="1" required />

                              </td>

                          </tr>
                      </table>
                      </div>
                        

                      </li>
                      <?php }?>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>

        </div>
    </div>
</div>
