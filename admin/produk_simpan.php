<?php require_once('../scripts/connect.php');
$gambar=$_FILES['gambar']['name'];
$q="INSERT INTO `produk`(`id_produk`, `nama`, `merek`, `kategori`, `ukuran`, `deskripsi`, `harga`, `kuantitas`, `gambar`, `diskon`) VALUES ('','$_POST[nama]','$_POST[merek]','$_POST[kategori]','$_POST[ukuran]','$_POST[deskripsi]','$_POST[harga]','$_POST[kuantitas]','$gambar','')";
$simpan=mysqli_query($link,$q);
copy($_FILES['gambar']['tmp_name'],"../products/".$gambar);
if($simpan){
echo"<script>
alert('Produk Berhasil disimpan')
window.parent.location='produk_tambah.php'
</script>";
}else{
echo"<script>
alert('Produk Gagal disimpan')
window.parent.location='produk_tambah.php'
</script>";
}
?>