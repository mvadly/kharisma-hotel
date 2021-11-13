<?php include 'header.php';?>

<style type="text/css">
	input[type=text]{
		background-color: rgba(0,0,0,0);
		border:none;
		font-weight: bold;
	}
	li{
		list-style-type: none;
	}
	legend{
		margin-bottom: 15px;
		margin-top: 15px;
	}
</style>
<h1 align="center">Tampil Data Check In</h1>

<form name="Simpan" action="<?php echo site_url();?>bresave/savebook" enctype="multipart/form-data" method="post">
<ul>
<li style="display: inline-table;"><fieldset >
	<legend>Data Tamu</legend>
	<table id="data_member" >
		<tr>
			<td width="150">No. Identitas</td>
			<td width="10">:</td>
			<td ><input type="text" name="no_id" readonly="text"  value="<?php echo $no_id; ?>" /></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama_tamu" readonly="text"  value="<?php echo $nama_tamu ?>" /></label></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="text" name="jeniskelamin" readonly="text"  value="<?php echo $jeniskelamin ?>" /></td>
		</tr>
		<tr>
			<td>Warga Negara</td>
			<td>:</td>
			<td><input type="text" name="warganegara" readonly="text"  value="<?php echo $warganegara ?>" /></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="text" name="tgl_lahir" readonly="text"  value="<?php echo $tgl_lahir ?>" /></td>
		</tr>
		<tr>
			<td>No. Telepon</td>
			<td>:</td>
			<td><input type="text" name="no_telp" readonly="text"  value="<?php echo $no_telp ?>" /></td>
		</tr>
		<tr>
			<td>E-Mail</td>
			<td>:</td>
			<td><input type="text" name="email" readonly="text"  value="<?php echo $email ?>" /></td>
		</tr>

	</table>
		
	</fieldset>
</li>
<li style="display: inline-table;"><fieldset>
		<legend >Data cottage</legend>
		<table >
			<tr>
				<td width="150">Kode cottage</td>
				<td width="10">:</td>
				<td><input type="text" name="kode_cottage" readonly="text"  value="<?php echo $_POST['kode_cottage']; ?>" /></td>
      </tr>
      <tr>
        <td>Nama cottage</td>
        <td>:</td>
        <td><input type="text" name="nama_cottage" readonly="text"  value="<?php echo $_POST['nama_cottage']; ?>" /></td>
      </tr>
      <tr>
        <td>Jumlah Kamar</td>
        <td>:</td>
        <td><input type="text" name="jml_kamar" readonly="text" size="1" value="<?php echo $_POST['jml_kamar']; ?>" />Kamar</td>
      </tr>
      <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td>Rp. <input type="text" name="hargasewa" readonly="text"  value="<?php echo $_POST['hargasewa']; ?>" /></td>
      </tr>
    </table>
      
    </fieldset> 
</li>
<li>
	<fieldset>
	<legend id="btnsewa">Pembayaran</legend>
	<table align="center">
		<tr>
		<td width="150">Tanggal Check In</td>
		<td width="10">:</td>
		<td><input type="text" name="tgl_masuk" readonly="text"  value="<?php echo $tgl_masuk ?>" /></td>
		
		</tr>
		<tr>
		<td>Tanggal Check Out</td>
		<td>:</td>
		<td><input type="text" name="tgl_keluar" readonly="text"  value="<?php echo $tgl_keluar; ?>" /></td>
		</tr>
		<tr>
		<td>Lama</td>
		<td>:</td>
		<td><input type="text" name="lama" readonly="text"  value="<?php echo $lama; ?>" /></td>
		</tr>
		<td>Total Bayar</td>
		<td>:</td>
		<td><input type="text" name="total_harga_sewa" readonly="text"  value="<?php echo $_POST['hargasewa']*$lama; ?>" /></td>
		</tr>
		<td>Besar Minimal yg harus dibayar</td>
		<td>:</td>
		<td><input type="text" name="minimalbayar" readonly="text"  value="<?php echo ($_POST['hargasewa']*$lama)/2 ?>" /></td>
		</tr>
		<tr>
		<td>Bukti Lampiran</td>
		<td>:</td>
		<td><input type="file" name="buktip" value=""></td>
		</tr>

	</table>
		
	</fieldset>
</li>

	<li><input type="submit" name="submit" value="Simpan" /></li>
	</ul>
	</form>
	</fieldset>

<?php include 'footer.php';?>
