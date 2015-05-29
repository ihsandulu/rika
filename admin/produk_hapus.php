<?php session_start();
include('../scripts/connect.php');
$no=$_GET['id'];
$del="DELETE FROM produk WHERE id_produk='$no'";
$a=mysqli_query($link,$del)or die(mysql_error());

if($del){
echo"<script>
alert('Produk Terpilih Berhasil Dihapus')
window.location.href='produk.php'
</script>";
}else{
echo"<script>
alert('Produk Terpilih Gagal Dihapus')
window.location.href='produk.php'
</script>";
}
?>