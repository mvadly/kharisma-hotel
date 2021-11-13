<div class="panel panel-primary">
<div class="panel-heading">
Pembayaran
</div>
<div id="widget1" class="panel-body collapse in">
<fieldset>
			Total yang harus dibayar
			<input readonly type="text" name="pembayaran" id="pembayaran" class="form-control" />
			Bayar
			<input type="text" name="bayar" id="bayar" onchange="javascript: tesbayar()" class="form-control" />
			Kembali
			<input type="text" readonly name="kembali" id="kembali" class="form-control "/><br/>
			<input type="submit" name="simpan" class="btn btn-primary form-control" value="Simpan" onclick="return confirm('Yakin data akan disimpan?')" />
			
</fieldset>
</div>
</div>