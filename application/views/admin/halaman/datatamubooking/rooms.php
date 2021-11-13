<div class="panel panel-default" ">
<div class="panel-heading">
Rooms
</div>
<div id="widget1" class="panel-body collapse in">

		<table class="table ">
	<tr>
		<td width="200">Kode Rooms</td>
		<td width="10"></td>
		<td><?php echo $kode_rooms; ?></td>
	</tr>
	<tr>
		<td>Jumlah Kamar</td>
		<td></td>
		<td><?php echo $jml_kamar; ?> Kamar</td>
	</tr>
		<tr>
		<td>Lantai</td>
		<td></td>
		<td><?php echo $lantai; ?></td>
	</tr>
	<tr>
		<td>Harga Sewa</td>
		<td></td>
		<td>Rp. <?php echo number_format($hargasewa+$nominal); ?>,-</td>
	</tr>
	
</table>

</div>
</div>