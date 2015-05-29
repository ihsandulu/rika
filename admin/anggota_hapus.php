<?php session_start();
include('../scripts/connect.php');
$no=$_GET['id'];
$del="DELETE FROM user WHERE username='$no'";
$a=mysqli_query($link,$del)or die(mysql_error());
$hapus=mysqli_query($link,"DELETE FROM user WHERE username='$no'");
if($a){
echo"<script>
alert('Anggota Terpilih Berhasil Dihapus')
window.location.href='anggota.php'
</script>";
}else{
echo"<script>
alert('Order Terpilih Gagal Dihapus')
window.location.href='anggota.php'
</script>";
}

?>