<?php 

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
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/dropify/dropify.min.css'?>">
<style type="text/css">
	table{
		text-transform: capitalize;
	}
</style>
<div class="row">
<div class="col-md-6">
<table class="table text-left" width="100%">
	<tr>
		<td align="right">ID Booking</td>
		
		<td><?php echo $id_books; ?></td>

	</tr>
	<tr>
		<td align="right">Nama Pelanggan</td>
		
		<td><?php echo $nama_tamu; ?></td>
	</tr>
	<tr>
		<td align="right">Kode Room</td>
		
		<td><?php echo $kode_rooms; ?></td>
	</tr>
	<tr>
		<td align="right">Tipe Booking</td>
		
		<td><?php echo $tipe; ?></td>
	</tr>
	<tr>
		<td align="right">Harga Sewa Room</td>
		
		<td><?php echo number_format($hargasewa); ?></td>
	</tr>
	<tr>
		<td align="right">Tanggal Check In</td>
		
		<td><?php echo $tgl_masuk; ?></td>
	</tr>
	<tr>
		<td align="right">Tanggal Check Out</td>
		
		<td><?php echo $tgl_keluar; ?></td>
	</tr>
	<tr>
		<td align="right">Total Sewa</td>
		
		<td><?php echo number_format($hargasewa*$lama); ?></td>
	</tr>
	<tr>
		<td align="right">Minimal Pembayaran</td>
		
		<td><?php echo number_format(($hargasewa*$lama)*0.3); ?></td>
	</tr>
	<tr>
		<td align="right">Status Booking</td>
		
		<td><span class="label label-<?php echo $label?>"><?php echo ucfirst($status); ?></span></td>
	</tr>
</table>
<?php if ($buktip==null) {
	echo "<p>Masukan kode pembayaran <strong>".$pcode."</strong> ketika transfer untuk validasi admin.</p>";
} ?>
</div>

<div class="col-md-6">

<?php if ($buktip!=null) {?>
		<div style="padding: 20px;">
		<img src="<?php echo base_url('assets/upload/buktibayar/'.$buktip) ?>" width="100%">
		<?php }else{?>
		
		
			<form action="<?php echo base_url('cekbook/upload_image') ?>" method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<input type="hidden" name="id_books" value="<?php echo $id_books ?>" />
					<input type="file" name="buktip" class="dropify"  data-height="300" />
				</div>
				<div class="form-group">
					<button class="btn btn-new" type="submit" >Lampirkan</button>
				</div>
			</form>
		<div id="result"></div>
		
		<?php } ?>
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