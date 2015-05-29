<?php
require_once("scripts/connect.php");
$user=$_POST['username'];
$nama=$_POST['namalengkap'];
$pass=($_POST['password']);
$konfirm=($_POST['konfirmasi']);

if ($pass <> $konfirm)
{
	echo"<script>alert('Kata Sandi dan Ulangi Kata Sandi Harus Sama')
	window.location.href='daftar.php'
	</script>";
}
else
{
	$daftar=mysqli_query($link,"insert into user values('$user','$konfirm','$nama')");
	if($daftar)
	{
		echo"<script type='text/javascript'>
		alert('Anda Telah Terdaftar')
		window.location.href='login.php'
		</script>";
	}
	else
	{
		echo"<script type='text/javascript'>
		alert('Nama Anggota Sudah Ada, Coba Nama Lain')
		window.location.href='daftar.php'
		</script>";
	}
}
?>
