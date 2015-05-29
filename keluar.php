<?php

session_start();
$_SESSION = array();
session_destroy();
if(!isset($_SESSION['name'])){
echo"<script>
alert('Terimakasih Telah Berkunjung Di Website Kami')
window.location.href='index.php'
</script>";
}else{
	echo "<h2>Tidak dapat keluar, Sistem error.</h2>";
	exit();
}

?>