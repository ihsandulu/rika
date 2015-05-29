<?php
include("scripts/connect.php");
$tanggal=date("Ymd");
$nama = $_POST['name'];
$email = $_POST['email'];
$subyek = $_POST['subyek'];
$pesan=$_POST['pesan'];		
$query = mysqli_query($link,"INSERT INTO pesan (username,email,subyek,pesan,tanggal) 
VALUES ('$nama','$email','$subyek','$pesan','$tanggal')") or die (mysql_error());
$result = mysqli_query($link,$query);
if ($query) 
{
	echo"<script type='text/javascript'>
	alert('Pesan Terkirim')
	window.location.href='kontak.php'
	</script>";
}
else
{
	echo"<script type='text/javascript'>
	alert('Pesan Terkirim')
	window.location.href='kontak.php'
	</script>";
}
?>