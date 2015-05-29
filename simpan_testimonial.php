<?php
include("scripts/connect.php");
$valid_nama= "/^[a-z]+[.,a-z ]+$/";
$valid_mail = "/^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$/";
$tanggal=date("Ymd");
$nama = $_POST['name'];
$email = $_POST['email'];
$testimonial=$_POST['testimonial'];		
$query = mysqli_query($link,"INSERT INTO testimonial (username,email,tanggal,testimonial) 
VALUES ('$nama','$email','$tanggal','$testimonial')") or die (mysqli_error());
$result = mysqli_query($link,$query);
if ($query) 
{
	echo"<script type='text/javascript'>
	alert('Testimonial Terkirim')
	window.location.href='testimonial.php'
	</script>";
}
else
{
	echo"<script type='text/javascript'>
	alert('Testimonial Gagal Terkirim')
	window.location.href='form_testimonial.php'
	</script>";
}
?>