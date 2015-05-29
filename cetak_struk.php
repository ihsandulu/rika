<?php
require_once('scripts/connect.php');
$nod=$_GET['nod'];
$np=$_POST['namanya'];
$nt=$_POST['no_telp'];
$e=$_POST['email'];
$a=$_POST['alamat'];
$bk=$_POST['kotatujuan'];
$ukuran=$_POST['ukuran'];
$sql=mysqli_query($link,"select * from user where namalengkap='$np'");
while($ulang=mysqli_fetch_assoc($sql)){
$user=$ulang['username'];
}
$update=mysqli_query($link,"UPDATE transaksi_detail set ukuran='$ukuran',username='$user', no_telp='$nt', email='$e', alamat='$a',biayakirim='$bk' where no_transaksi='$nod'") or die ("gagal".mysql_error());
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bag Shoop</title>
<link rel="shortcut icon" href="products/7.Tas Ransel FDC 014.jpg">
<link rel="stylesheet" type="text/css" href="struk.css"></head>
<style>
body{font-family:Arial, Helvetica, sans-serif; font-size:12px;}
</style>
<body>
<?php
$tampil=mysqli_query($link,"select * from transaksi_detail where no_transaksi='$nod'");
$isi=mysqli_fetch_assoc($tampil);
  $noorder=$isi['no_transaksi'];
  $tgl=$isi['tgl_transaksi'];
$biayakirim=$isi['biayakirim'];?>
<table width="50%" border="0" cellpadding="2" cellspacing="2" class="struk">
  <tr>
    <td colspan="3"><h2 align="center" style="line-height:0.5">Struk Order Aleeya Shop</h2>      
    <div align="center" style="line-height:1"></div>
    <br></td>
  </tr>
  <tr>
    <td width="49%" colspan="3" style="border:0;" id="jorok">&nbsp;No Order:&nbsp;<?php echo $noorder;?><br>
      <br>      
    &nbsp;Tanggal Order:&nbsp;<?php echo $tgl;?></td>
  </tr>
  <tr>
    <td width="49%" height="58" align="center">&nbsp;Nama Produk</td>
    <td width="40" align="center">&nbsp;Jumlah Beli</td>
    <td>&nbsp;Subtotal</td>
  </tr>
  <?php 
		$total=0;
		$qo="select * from transaksi where no_transaksi='$nod'";
		$show=mysqli_query($link,$qo);
		while($data=mysqli_fetch_assoc($show)) {

  	$kb=$data['id_produk'];
  	$jb=$data['jumbel'];
  	$st=$data['subtotal']; 

 	 $total=$total+$st;
  	$grandtotal=$total+$bk;
	
	?>
  <?php
  $qq="select * from produk where id_produk='$kb'";
	$selectbarang=mysqli_query($link,$qq);
	while ($dt=mysqli_fetch_assoc($selectbarang)) {
	 $nb=$dt['nama'];
	}
	?>
  <tr>  
    <td height="56" id="jorok">&nbsp;
  <?php 
  	if ($kb){
  	echo "$nb";
   }?>    </td>
    <td><div align="center"><?php echo $jb;?></div></td>
    <td>&nbsp;Rp. <?php echo number_format($st,0,',','.').",-"; ;?></td>
  </tr>
  <?php } ?>
  <tr>
    <td height="42" colspan="2" align="right">&nbsp;Biaya Kirim :</td>
    <td>&nbsp;Rp. <?php echo number_format($biayakirim,0,',','.').",-"; ;?></td>
  </tr>
  <tr>
    <td height="41" colspan="2" align="right">&nbsp;Total Bayar :</td>
    <td>&nbsp;Rp. <?php echo number_format($grandtotal,0,',','.').",-"; ;?></td>
  </tr>
  <tr>
    <td height="37" colspan="3" id="jorok"><div align="left" >
  	<p><i>*Harap simpan struk ini sebagai tanda bukti pemesanan</i></p>
    <p><i>*Mohon konfirmasi via sms ke nomor ( 0888 ) 970 5652 setelah Anda melakukan pembayaran, dengan
format: (NOMOR_ORDER),(BANK_TUJUAN),(TOTAL BAYAR)
contohnya: NO190714001,BCA,310.000</i></p>
    <p><i>*Daftar bank tujuan: BCA(3482109428) BRI(9873844085) atau MANDIRI(3784784230) atas nama BOWO </i></p>
    <p><em>*Biaya kirim produk berdasarkan kota tujuan masing - masing </em></p>
    <p><i>*Pesanan sudah kami terima, barang akan dikirim 1 hari setelah penerimaan pembayaran</i></p>
    <p><i>*Pesanan akan kami cancel apabila dalam 3x24 jam belum kami terima pembayarannya</i></p>
    <p style="text-align:100;">Terimakasih telah berbelanja Ditoko Kami :)</div></td>
</tr>
</table>
<div align="center">
	<a href="produk2.php?target=semua" style="text-decoration:none; font-size:30px;" class="btn btn-primary">Belanja Lagi</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="keluar.php" style="text-decoration:none; font-size:30px;" class="btn btn-primary">Selesai</a>
</div>
</body>
</html>