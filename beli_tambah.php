<?php
session_start();
require_once("scripts/connect.php");

$uname=$_SESSION['username'];
echo$isi="select * from keranjang WHERE  username='$uname' AND id_produk='$_GET[kodebarang]'";
$sql=mysqli_query($link,$isi);
while($data=mysqli_fetch_assoc($sql)){
$jumlah=$data['jumbel'];
}

$sqlbrg=mysqli_query($link,"select*from produk where id_produk='$_GET[kodebarang]'");
while($n=mysqli_fetch_assoc($sqlbrg)){
if($n['diskon']==0){$harga=$n['harga'];}else{$harga=$n['harga']-($n['harga']*$n['diskon']/100);}
$stok=$n['kuantitas'];
}
if ($stok == "0"){
	echo '<script>
		alert("stok habis!")</script>';
		$subtotalnya=0;
	$jumlah2=(1*0)+$jumlah;
	$subtotalnya=$harga*$jumlah2;
	$batalkeranjang=mysqli_query($link,"update keranjang set jumbel='$jumlah2',subtotal='$subtotalnya' where id_produk='$_GET[kodebarang]' and username='$uname'");
	$stoknya=0;
	$bataltambah=mysqli_query($link,"update produk set kuantitas='$stoknya' where id_produk='$_GET[kodebarang]'");
	
}else{
$tjumbel=1;
$stokakhir=0;
$stokakhir=($stok+$jumlah)-$tjumbel;
$upgrb=mysqli_query($link,"update produk set kuantitas='$stok'-1 where id_produk='$_GET[kodebarang]'");
$subtotal=0;
$subtotal=$harga*($jumlah+$tjumbel);
$ubah=mysqli_query($link,"update keranjang set jumbel='$jumlah'+1,subtotal='$subtotal' where id_produk='$_GET[kodebarang]' and username='$uname'");	

}
include "keranjang_belanja.php";
?>