<?php
include('../scripts/connect.php');

$edit=mysqli_query($link,"UPDATE transaksi_detail SET status_pesanan='$_POST[status]' where no_transaksi='$_GET[id]'");

if($edit){
echo"<script>
alert('Status Order diubah')
window.parent.location='admin_orders.php'
</script>";
}else{
echo"<script>
alert('Gagal!')
window.parent.location='admin_orders.php'
</script>";
}
?>