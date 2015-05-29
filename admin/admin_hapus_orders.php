<?php session_start();
include('../scripts/connect.php');
$no=$_GET['id'];
$del="DELETE FROM transaksi WHERE no_transaksi='$no'";
$a=mysqli_query($link,$del)or die(mysql_error());
$hapus=mysqli_query($link,"DELETE FROM transaksi_detail WHERE no_transaksi='$no'");
if($del){
echo"<script>
alert('Order Terpilih Berhasil Dihapus')
window.location.href='admin_orders.php'
</script>";
}else{
echo"<script>
alert('Order Terpilih Gagal Dihapus')
window.location.href='admin_orders.php'
</script>";
}

?>
