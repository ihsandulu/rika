<?php
require_once("scripts/connect.php");
$postuser=$_POST['username'];
$kodebarang=$_POST['id_produk'];


$validasi=mysqli_query($link,"select*from keranjang where id_produk='$kodebarang' and username='$postuser'");
$cek=mysqli_num_rows($validasi);
if($cek>0){
echo"<script>alert('Produk ini sudah ada di keranjang belanja anda')</script>";
include("keranjang_belanja.php");
exit();
}


$beli=mysqli_query($link,"select*from produk where id_produk='$kodebarang'");
while($field=mysqli_fetch_assoc($beli)){
$kode=$field['id_produk'];
$nama=$field['nama'];
if($field['diskon']==0){$harga=$field['harga'];}else{$harga=$field['harga']-($field['harga']*$field['diskon']/100);}
$spek=$field['deskripsi'];
$stok=$field['kuantitas'];
}


$jumbel=$_POST['jumbel'];
$subtotal=0;
$subtotal=$harga*$jumbel;
$simpankeranjang=mysqli_query($link,"insert into keranjang values('','$kodebarang','$jumbel','$subtotal','$postuser')");

$stokakhir=$stok-1;
$updatebarang=mysqli_query($link,"update produk set kuantitas='$stokakhir' where id_produk='$kodebarang'");
include("keranjang_belanja.php");


?>