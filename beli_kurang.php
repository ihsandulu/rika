<?php 
session_start();
require_once("scripts/connect.php");

$uname=$_SESSION['username'];
$sql=mysqli_query($link,"select*from keranjang WHERE  username='$uname' AND id_produk='$_GET[kodebarang]'");
while($data=mysqli_fetch_assoc($sql)){
$jumlah=$data['jumbel'];
}

$sqlbrg=mysqli_query($link,"select*from produk where id_produk='$_GET[kodebarang]'");
while($n=mysqli_fetch_assoc($sqlbrg)){
if($n['diskon']==0){$harga=$n['harga'];}else{$harga=$n['harga']-($n['harga']*$n['diskon']/100);}
$stok=$n['kuantitas'];
}
if ($jumlah == "1"){
	echo '<script>
		alert("minimal pembelian 1!")</script>';
	// $stoknya=1;
	// $bataltambah=mysql_query("update barang set stok='$stoknya' where kodebarang='$_GET[kodebarang]'");
	$subtotalnya=0;
/*	$jumlah2=(1*0)+$jumlah;*/
	$subtotalnya=$harga*$jumlah;
	$batalkeranjang=mysqli_query($link,"update keranjang set jumbel='1',subtotal='$subtotalnya' where id_produk='$_GET[kodebarang]' and username='$uname'");
}else{
$tjumbel=1;
$stokakhir=0;
$stokakhir=($stok+$jumlah)-$tjumbel;
$upgrb=mysqli_query($link,"update produk set kuantitas='$stok'+1 where id_produk='$_GET[kodebarang]'");
$subtotal=0;
$subtotal=$harga*($jumlah-$tjumbel);
$ubah=mysqli_query($link,"update keranjang set jumbel='$jumlah'-1,subtotal='$subtotal' where id_produk='$_GET[kodebarang]' and username='$uname'");
}
include "keranjang_belanja.php";
?>