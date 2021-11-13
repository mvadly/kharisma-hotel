
<div class="form-group">
	<div class="input-group date" id="tgl1">
		<input type="text" class="form-control" name="tgl_masuk" value="<?php echo $masuk ?>" readonly />	
			<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
	</div>
</div>
<div class="form-group">
	<div class="input-group date" id="tgl2">
		<input type="text" class="form-control" name="tgl_keluar" placeholder="Tanggal Check Out" value="<?php echo $keluar ?>" required/>	
    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
			
	</div>
</div>
<div class="form-group">
  <div class="input-group date">
		<input type="text" class="form-control" id="lama" name="lama" placeholder="Lama Sewa" value="<?php echo $lama ?>" readonly />	
    <span class="input-group-addon">Hari</span>
  </div>
</div>

<script>

$(function() { 
  $('#datepicker').datetimepicker({
   locale:'id',
   format:'YYYY-MM-DD'
   });

  $('#tgl1').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD'
   });
   
  $('#tgl2').datetimepicker({
   useCurrent: false,
   locale:'id',
   format:'YYYY-MM-DD'
   });
   
   $('#tgl1').on("dp.change", function(e) {
    $('#tgl2').data("DateTimePicker").minDate(e.date);
    CalcDiff()
  });
  
   $('#tgl2').on("dp.change", function(e) {
    $('#tgl1').data("DateTimePicker").maxDate(e.date);
      CalcDiff()
   });
  
});

function CalcDiff(){
var a=$('#tgl1').data("DateTimePicker").date();
var b=$('#tgl2').data("DateTimePicker").date();
    var timeDiff=0
     if (b) {
            timeDiff = (b - a) / 1000;
        }
	
	$('#lama').val(Math.floor(timeDiff/(86400)))  

}
</script>	

