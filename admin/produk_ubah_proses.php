<?php
include('../scripts/connect.php');
$gambar=$_FILES['gambar']['name'];
$edit=mysqli_query($link,"UPDATE produk SET nama='$_POST[nama]',merek='$_POST[merek]',kategori='$_POST[kategori]',kuantitas='$_POST[kuantitas]',ukuran='$_POST[ukuran]',harga='$_POST[harga]', deskripsi='$_POST[deskripsi]', gambar='$gambar' where id_produk='$_GET[id]'") or die ("gagal ".mysql_error());

copy($_FILES['gambar']['tmp_name'],"../products/".$gambar);
if($edit){
echo"<script>
alert('Produk Berhasil diubah')
window.parent.location='produk.php'
</script>";
}else{
echo"<script>
alert('Produk Helm Gagal diubah')
window.parent.location='produk.php'
</script>";
}
?>