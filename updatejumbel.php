<?php /*require_once("koneksi.php");
$sql=mysql_query("select*from keranjang where kodebarang='$_GET[kodebarang]'");
while($data=mysql_fetch_assoc($sql)){
$harga=$data['harga'];
$jumlah=$data['jumlahbeli'];
}

$sqlbrg=mysql_query("select*from barang where kodebarang='$_GET[kodebarang]'");
while($n=mysql_fetch_assoc($sqlbrg)){
$stok=$n['stok'];
}
$jumbel=$_POST['jumbel'];
$stokakhir=0;
echo $stok;

if ($stokakhir=="0" && $stok <= 0 &&  $stok < $jumbel){
	echo "<script>alert('tidak cukup!')</script>";
	$stokakhir=0;
	$jumbelakhir=($jumbel*0)+$jumlah;
	$update=mysql_query("update keranjang set jumlahbeli='$jumbelakhir' where kodebarang='$_GET[kodebarang]'");
	$apdet=mysql_query("update barang set stok='$stokakhir' where kodebarang='$_GET[kodebarang]'");
}else{
	$stokakhir=($stok+$jumlah)-$jumbel;
	$subtotal=0;
	$subtotal=$harga*$jumbel;
	$upgrb=mysql_query("update barang set stok='$stokakhir' where kodebarang='$_GET[kodebarang]'");
	$ubah=mysql_query("update keranjang set jumlahbeli='$jumbel',subtotal='$subtotal' where kodebarang='$_GET[kodebarang]'");
}
include "keranjang.php";*/

?>



<?php require_once("scripts/connect.php");
$sql=mysql_query("select*from keranjang where id_produk='$_GET[kodebarang]'");
while($data=mysql_fetch_assoc($sql)){
$harga=$data['harga'];
$jumlah=$data['jumbel'];
}

$sqlbrg=mysql_query("select*from produk where id_produk='$_GET[kodebarang]'");
while($n=mysql_fetch_assoc($sqlbrg)){
$stok=$n['kuantitas'];
}
$tjumbel=$_POST['jumbel'];
$stokakhir=0;
$stokakhir=($stok+$jumlah)-$tjumbel;
$upgrb=mysql_query("update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
$subtotal=0;
$subtotal=$harga*$tjumbel;
$ubah=mysql_query("update keranjang set jumbel='$tjumbel',subtotal='$subtotal' where id_produk='$_GET[kodebarang]'");
if ($stokakhir<=0){
	$stokakhir=0;
	$stoknol=mysql_query("update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
}
if ($tjumbel == $stokakhir){
	$tjumbel2=$tjumbel+1;
	$subtotal=($harga*$tjumbel);
	$ap=mysql_query("update keranjang set jumbel='$tjumbel2',subtotal='$subtotal' where id_produk='$_GET[kodebarang]'");
	$ub=mysql_query("update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
	
}
/*if ($tjumbel > $stok){
		$jumbel2=($tjumbel*0)+$jumlah;
		$subtotal=($harga*$jumbel2);
		$ap=mysql_query("update keranjang set jumlahbeli='$jumbel2',subtotal='$subtotal' where kodebarang='$_GET[kodebarang]'");
		$ub=mysql_query("update barang set stok='$stokakhir' where kodebarang='$_GET[kodebarang]'");
		echo"<script>alert('stok habis!')</script>";
		echo"1";
	}*/
if ($stokakhir==0){
	$jumbel2=($tjumbel*0)+$jumlah;
	$subtotal=($harga*$jumbel2);
	$ap=mysql_query("update keranjang set jumbel='$jumbel2',subtotal='$subtotal' where id_produk='$_GET[kodebarang]'");
	$ub=mysql_query("update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
	echo"<script>alert('stok habis!')</script>";
	echo"1";
}

if($tjumbel < $stokakhir && $stokakhir==0 & $stok = 0){
	$selisih=$jumlah-$tjumbel;
	$stokakhir=$jumlah+$selisih;
	$m=mysql_query("update keranjang set jumbel='$selisih' where id_produk='$_GET[kodebarang]'");
	$n=mysql_query("update produk set kuantitas='$stokakhir' where id_produk='$_GET[kodebarang]'");
	echo "4";
}
include "keranjang_belanja.php";
?>