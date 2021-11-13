<style type="text/css">
	.hari{
		color: white;
		font-weight: bold;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		padding: 10px 10px 10px 10px;
		background: #1992b1;
	}
	.badan{
		border: 2px solid #1992b1;
		text-align: center;
		font-size: 14;
		padding: 10px 10px 10px 10px;
		font-weight: bolder;
		color: #1992b1;
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
	}
</style>
<?php
$hari = date('D');
$tgl = date('d');
$bln = date('M');
$thn= date('Y');
?>
<div>
<div class="hari"><?php echo $hari;?></div>
<div class="badan">
	<!-- <div style="background: rgba(0,0,0,0.1);"> -->
	<h1 style="font-weight: bolder; background: rgba(0,0,0,0); color:#1992b1;  "><?php echo $tgl;?></h1>
	<?php echo $bln;?><br/>
	<?php echo $thn;?><br/>
<!-- 	</div> -->
	
</div>
</div>