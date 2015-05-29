<?php session_start();
if (ISSET($_SESSION['name']))
{
require("../scripts/connect.php");
$username = $_POST['usertxt'];
$pswlama = $_POST['pswlamatxt'];
$psw_tag = $_POST['pswbarutxt'];
$password = nl2br($psw_tag);
$password= str_replace("'","&acute;",$password);
	
$cari="select * from admin WHERE name ='".$username."'";
$hasil=mysqli_query($link,$cari);
$data=mysqli_fetch_assoc($hasil);
if($data > 0){
$pswcek = $data['password'];
}
if ($pswcek <> md5($pswlama)) {
	echo "<script>
		alert('Password lama salah!')
		</script>";
	echo"<meta http-equiv='refresh' content='0; url=admin_ubah_data.php'>";
	}else{
		$perintah =mysqli_query($link,"update admin set password='".md5($password)."' where name = '".$username."'")or die ("gagal".mysql_error());
		
	if ($perintah) {
		echo"<script>
		alert('Kata Sandi Berhasil Diubah')
		window.parent.location='admin_ubah.php'
		</script>";
	}else{ 
	echo"<script>
	alert('Kata Sandi Gagal Diubah')
	window.parent.location='admin_ubah_data.php'
	</script>";
	}
}
}
?>