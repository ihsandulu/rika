<?php require_once("scripts/connect.php");
//mengambil jumlah beli
$sql=mysqli_query($link,"select * from keranjang where id_produk='$_GET[kodebarang]'");
while($datadel=mysqli_fetch_assoc($sql)){
$jum=$datadel['jumbel'];}

//mengambil stok
$sqlproduk=mysqli_query($link,"select*from produk where id_produk='$_GET[kodebarang]'");
while($s=mysqli_fetch_assoc($sqlproduk)){
$stok=$s['kuantitas'];
}

//menghapus data belanja yang dibatalkan
$delbelanja=mysqli_query($link,"delete from keranjang where id_produk='$_GET[kodebarang]'");
$stokakhir=$stok+$jum;

//menambahkan kembali stok ke tabel barang karena batal dibeli
$up=mysqli_query($link,"update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
include"keranjang_belanja.php";
?>