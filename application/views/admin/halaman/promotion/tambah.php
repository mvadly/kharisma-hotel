<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/dropify/dropify.min.css'?>">
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 30px 30px 30px 30px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Promosi</h4>
            </div>
            <form action="<?php echo site_url('admin/promotion/simpan')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Promosi</label>
                        <input type="text" name="title_prm" class="form-control" required>
                        
                    </div>
                <div class="form-group">
                    <input type="file" name="gambar" class="dropify"  data-height="300" />
                </div>
   
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/dropify/dropify.min.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });


        

    });
    
</script>