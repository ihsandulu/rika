<?php session_start();
include('../scripts/connect.php');
$no=$_GET['id'];
$del="DELETE FROM testimonial WHERE id_testimonial='$no'";
$a=mysqli_query($link,$del)or die(mysql_error());
$hapus=mysqli_query($link,"DELETE FROM testimonial WHERE id_testimonial='$no'");
if($del){
echo"<script>
alert('testimonial Berhasil Dihapus')
window.location.href='testimonial.php'
</script>";
}else{
echo"<script>
alert('Testimonial Gagal Dihapus')
window.location.href='testimonial.php'
</script>";
}

?>