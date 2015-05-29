<?php session_start();
include('../scripts/connect.php');
$no=$_GET['id'];
$del="DELETE FROM pesan WHERE id_pesan='$no'";
$a=mysql_query($del)or die(mysql_error());
$hapus=mysql_query("DELETE FROM pesan WHERE id_pesan='$no'");
if($del){
echo"<script>
alert('pesan Berhasil Dihapus')
window.location.href='admin_pesan.php'
</script>";
}else{
echo"<script>
alert('pesan Gagal Dihapus')
window.location.href='admin_pesan.php'
</script>";
}

?>