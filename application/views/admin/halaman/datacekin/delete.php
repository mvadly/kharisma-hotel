<?php 
include('config.php');

$id = $_GET['kode_villa'];

$query = mysql_query("delete from data_villa where kode_villa='$id'") or die(mysql_error());

if ($query) {
	header('location:index.php?admin=datavilla','message=delete');
}
?>