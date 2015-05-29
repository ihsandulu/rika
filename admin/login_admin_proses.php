<?php session_start();
include ("../scripts/connect.php");
$admin=$_POST['username'];
$admin= str_replace("'","&acute;",$admin);
$password=$_POST['password'];
$password=str_replace("'","&acute;",$password);
$cek=" select * from admin where name='".$admin."' and password='".md5($password)."'";
$hasil = mysqli_query($link,$cek);
$hasil_cek = mysqli_num_rows($hasil);

if ($hasil_cek > 0){

$_SESSION['name'] =$admin;
echo"<script>alert('Selamat Datang Di halaman Administrator')
parent.location='index.php'</script>";
}else{
?>

	<script type="text/x-javascript">
	alert("Kata Sandi atau Nama Salah");
	</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>