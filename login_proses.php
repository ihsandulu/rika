<?php require_once("scripts/connect.php");
$p=($_POST['password']);
$hasil=mysqli_query($link,"select * from user where username='$_POST[username]' && password='$p'");
$data=mysqli_fetch_assoc($hasil);
$jumlah=mysqli_num_rows($hasil);
if ($jumlah > 0){
	session_start();
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	echo"<script>alert('Selamat Datang Di Bag Shoop, Selamat Berbelanja')
	parent.location='home.php'
	</script>";
	}
	else
	{
	echo"<script>alert('Nama Anggota Atau Kata Sandi Salah')
	parent.location='login.php'
	</script>";
	}

?>