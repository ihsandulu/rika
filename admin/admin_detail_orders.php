<?php

session_start();
require_once('../scripts/connect.php');
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}

$tampilkan2= mysqli_query($link,"SELECT * FROM transaksi_detail where no_transaksi='$_GET[id]'");
    while($isi=mysqli_fetch_assoc($tampilkan2)){
		
      $no=$isi['no_transaksi'];
	  $tgl=$isi['tgl_transaksi'];
	  $ukuran=$isi['ukuran'];
      $np=$isi['username'];
       $nt=$isi['no_telp'];
        $e=$isi['email'];
         $a=$isi['alamat'];
         $so=$isi['status_pesanan'];
    $bk=$isi['biayakirim'];  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8" />
<?php require_once("sisip.php");?>
<link rel="stylesheet" href="style/main.css" media="screen">
<link rel="stylesheet" href="style/forms.css" media="screen">
<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">
._css3m{display:none}
</style>
<!-- End css3menu.com HEAD section -->
</head>
<body>
	<div data-role="header" style=" float:inherit; position:relative; background-color:#F6CEF5; height:157px; width:94%; border-radius:10px; margin-left:3%; margin-right:3%; height:125px; top:25px;">
	<?php include_once("templates/tmp_header.php"); ?>
	
	</div>
	
	<div data-role="main" class="ui-content" style="float:left; position:relative; top:80px;">
 
    <table width="100%" border="0"  cellpadding="2" cellspacing="2">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Detail</strong>  </td>

    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >
	
	<form action="ubah_status.php?id=<?php echo $no;?>" method="post" enctype="multipart/form-data">
		
		<table width="100%" border="0">
  		<tr>
    		<td height="35" colspan="3" >&nbsp;No. Order : <?php echo $no;?></td>
        </tr>
        <tr>
        <td colspan="3" >&nbsp;Tanggal Order : <?php echo $tgl;?></td>
        </tr>
  		<tr>
    		<td width="33%" height="37"  align="center" bgcolor="#CCCCCC">
    		  <div align="center">Nama Barang</div></td>
    		<td width="16%" bgcolor="#CCCCCC" ><div align="center">Jumlah Beli</div></td>
    		<td colspan="2" bgcolor="#CCCCCC" ><div align="center">Subtotal</div></td> 
       </tr>
  <?php 
   $total=0;
   $orderdetail=mysqli_query($link,"select * from transaksi where no_transaksi='$no'");
	while ($x=mysqli_fetch_assoc($orderdetail)) {
		$kb=$x['id_produk'];
 		$st=$x['subtotal'];
 		$jb=$x['jumbel'];
 		$total=$total+$st;
 
$selectbarang=mysqli_query($link,"select * from produk where id_produk='$kb'");
while ($dt=mysqli_fetch_assoc($selectbarang)) {
 $nb=$dt['nama'];
 }
    
 
?>  
  <tr>
    <td height="36" bgcolor="#FFFFFF"><div align="center">&nbsp;<?php 
          if($kb){
            echo "$nb";
          }?></div></td>
    <td bgcolor="#FFFFFF"><div align="center">&nbsp;<?php echo $jb;?></div></td>
    <td bgcolor="#FFFFFF"><div align="center">Rp.&nbsp;<?php echo number_format($st,0,',','.').",-";?>&nbsp;</div></td>
  </tr>
<?php } ?>

  <tr>
    <td height="36" colspan="2" ><div align="right">Total :&nbsp;</div></td>
    <td bgcolor="#FFFFFF"><div align="center">Rp.&nbsp;<?php echo number_format($total,0,',','.').",-";?>&nbsp;</div></td>
    </tr>
  <tr>
    <td height="49" colspan="2" ><div align="right">Biaya Kirim :&nbsp;</div></td>
    <td bgcolor="#FFFFFF"><div align="center">Rp.&nbsp;<?php echo number_format($bk,0,',','.').",-";?>&nbsp;</div></td>
  </tr>
      <?php
		  $grandtotal=$bk+$total;
		  
		  ?>
  <tr>
    <td height="41" colspan="2" ><div align="right">Grand Total :&nbsp;</div></td>
    <td bgcolor="#eeeeee"><div align="center">Rp.&nbsp;<?php echo number_format($grandtotal,0,',','.').",-";?>&nbsp;</div></td>
    </tr>
  <tr>
    <td colspan="3" width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><div align="left"><b>Data Diri Pemesan</b></div></td>
    </tr>
  <tr>
  <?php $sql=mysqli_query($link,"select * from user where username='$np'");
while($ulang=mysqli_fetch_assoc($sql)){
$x=$ulang['username'];
} ?>
    <td height="37" colspan="2" >&nbsp;Nama :</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php echo $x;?></td>
    </tr>
  <tr>
    <td height="35" colspan="2" >&nbsp;No. Telepon :</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php echo $nt;?></td>
    </tr>
  <tr>
    <td height="36" colspan="2" >&nbsp;Email :</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php echo $e;?></td>
    </tr>
  <tr>
    <td height="35" colspan="2" >&nbsp;Alamat Lengkap :</td>
    <td >&nbsp;<?php echo $a;?></td>
    </tr>
  <tr>
    <td height="41" colspan="2"  style="color:#000">&nbsp;Status Transaksi : <?php
        
          if ($so=="konfirmasi"){
           echo "<b style='color:#000;'>PESANAN SUDAH DIKIRIM</b>";

          }else{
            echo "<b style='color:#f00;'>MASIH PESANAN</b>";

          }?></td>
    <td width="40%" >
      <div align="center">
        <label for="select"><select name="status" size="1" id="select">
          <option value="ORDER">Masih Pesan</option>
          <option value="KONFIRMASI">Sudah Kirim</option>
        </select></label>
      </div></td>
  </tr>
  <tr>
    <td  colspan="2"  style="color:#000">&nbsp;</td>
    <td bgcolor="#eeeeee" ><div align="center">
      <input type="submit" name="button" id="button" value="UBAH STATUS" class="btn btn-primary">
    </div></td>
  </tr>
</table>

</form>
    <div align="left"><a style="cursor:pointer;color:#000;" onClick="history.go(-1);"><< Kembali Ke Data Order</a></div></td>
<td>&nbsp;</td>
</tr>
</table>



       <div data-role="footer">
        <?php include_once("templates/tmp_aside.php"); ?>
       
        <?php include_once("templates/tmp_footer.php"); ?>
	  </div>
    </div>
</body>
</html>