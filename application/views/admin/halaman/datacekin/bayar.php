<div class="panel panel-default">
<div class="panel-heading">
Pembayaran
</div>
<div id="widget1" class="panel-body collapse in">

	<table class="table " width="100%">
	<tr>
		<td width="200">Tanggal Check In</td>
		<td width="10">:</td>
		<td><?php echo $tgl_masuk; ?></td>
	</tr>
	<tr>
		<td>Tanggal Check Out</td>
		<td>:</td>
		<td><?php echo $tgl_keluar; ?></td>
	</tr>
	<tr>
		<td>Lama</td>
		<td>:</td>
		<?php $lama = ((abs(strtotime($tgl_keluar)-strtotime($tgl_masuk)))/(60*60*24)); ?>
		<td><?php echo $lama ?></td>
	</tr>
	<tr>
		<td>Yang Harus Dibayar</td>
		<td>:</td>
		<td><?php echo $lama*$hargasewa; ?></td>
	</tr>
	<tr>
		<td>Yang Telah Dibayar</td>
		<td>:</td>
		<td><?php echo $bayar; ?></td>
	</tr>
	<tr>
		<td>Sisa yang harus Dibayar</td>
		<td>:</td>
		<td><?php echo $bayar-($lama*$hargasewa); ?></td>
		<?php
		$lunas= $bayar-($lama*$hargasewa);
		if ($lunas < 0){
			$ket='Belum Lunas';
		}else{
			$ket='Lunas';
		}
		?>
		<td><?php echo $ket ?></td>
	</tr>



		

</table>		

</div>
</div>