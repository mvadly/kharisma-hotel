<?php 
$lama = ((abs(strtotime($tgl_keluar)-strtotime($tgl_masuk)))/(60*60*24));

$total_harga_sewa=($hargasewa+$nominal)*$lama;
?>
<div class="panel panel-default">
<div class="panel-heading">
Pembayaran
</div>
<div id="widget1" class="panel-body collapse in">

	<table class="table " width="100%">
	<tr>
		<td width="200">Tanggal Masuk</td>
		<td width="10"></td>
		<td><?php echo $tgl_masuk; ?></td>
	</tr>
	<tr>
		<td>Tanggal Keluar</td>
		<td></td>
		<td><?php echo $tgl_keluar; ?></td>
	</tr>
	<tr>
		<td>Tipe Booking</td>
		<td></td>
		<td><?php echo $tipe_bayar ?></td>
	</tr>

	<tr>
		<td>Total Harga Sewa</td>
		<td></td>
		<td>Rp. <?php echo number_format($total_harga_sewa); ?>,-</td>
	</tr>
<?php if ($transby=='byself') {?>
	<tr>
		<td>Minimal DP</td>
		<td></td>
		<td>Rp. <?php echo number_format(($total_harga_sewa)*(30/100));  ?>,-</td>
	</tr>
	<?php 
		
		$tesdp='Masukan DP';
		if (($status_ci=='booked') or ($status_ci=='checkin') ) {
			$tesdp='DP Terbayar';
			?>

		
	<tr class="form-group">
		<td>
		<p><?php echo $tesdp ;?></p><br>
		<p>Sisa</p>
		</td>
		<td></td>
		<td>
			
		

				<p><input type="text" name="dp" class="form-control" value="<?php echo $dp;  ?>" readonly></p>
				<p><input type="text" name="sisa" class="form-control" value="<?php echo $total_harga_sewa+$nominal-$dp;  ?>" readonly></p>
				</td>
				
			<?php }else if ($status_ci=='unverified'){ ?>
	<tr class="form-group">
		<td><?php echo $tesdp ;?></td>
		<td></td>
		<td>
				<input type="number" name="dp" class="form-control" value="<?php echo $dp;  ?>" placeholder="Masukan DP" >

			
		
		</td>
	</tr>
	<?php } } ?>
</table>		

</div>
</div>