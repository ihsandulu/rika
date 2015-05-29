<?php

$style="";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");

if (isset($_SESSION['username'])){
$user=$_SESSION['username'];
}

$sqlkrj=mysqli_query($link,"SELECT * FROM keranjang WHERE username='$user'");
$total=0;
while($field=mysqli_fetch_assoc($sqlkrj)){
$subtotal=$field['subtotal'];
$id_p=$field['id_produk'];

$total=$total+$subtotal;
} 
date_default_timezone_set('Asia/Jakarta');
$today=date('dmy');
/*$kode="NO".$today."001";
if($kode){*/
$pilih=mysqli_query($link,"SELECT max(no_transaksi) AS no_transaksi FROM transaksi_detail ORDER BY no_transaksi desc");
$pecah=mysqli_fetch_assoc($pilih);
  $cek=mysqli_num_rows($pilih);
  
  if ($cek < 1){
    $kode="NO".$today."001";
  }else{

    $b=substr($pecah['no_transaksi'],9,3);
    $konvers=(int)$b;
    $kode=$konvers+1;
    if($kode < 10){
      $kode="NO".$today."00".$kode;
    }
    elseif($kode>9 && $kode<=99){
      $kode="NO".$today."0".$kode;  
    }
    else{
      $kode="NO".$today.$kode;  
    }
  }
/*}*/
mysqli_query($link,"INSERT INTO transaksi_detail set no_transaksi='$kode',tgl_transaksi=now(),id_produk='$id_p',total='$total',status_pesanan='ORDER'") or die ("gagal!".mysql_error());


$pesan=mysqli_query($link,"SELECT * FROM transaksi_detail");
while($dt=mysqli_fetch_array($pesan)){
$noorder=$dt['no_transaksi'];
$tanggal=$dt['tgl_transaksi'];
}



$keranjang=mysqli_query($link,"Select * From keranjang where username='$user'");
while($sk=mysqli_fetch_array($keranjang)){
$kb=$sk['id_produk'];
$jumbel=$sk['jumbel'];
$subtotal=$sk['subtotal'];
$orderdetail=mysqli_query($link,"Insert Into transaksi SET no_transaksi='".$noorder."',id_produk='".$kb."',jumbel='".$jumbel."',subtotal='".$subtotal."',username='".$user."'")or die("Gagal ".mysql_error());
}

if(isset($orderdetail)){
$hapkrj=mysqli_query($link,"delete from keranjang where username='$user'");
}

?>

<?php
$orderdetail=mysqli_query($link,"SELECT * FROM transaksi_detail");
while ($data=mysqli_fetch_assoc($orderdetail)) {
$nod=$data['no_transaksi'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bag Shop</title>
<link rel="shortcut icon" href="products/7.Tas Ransel FDC 014.jpg">
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" media="screen" href="style/white_black.css">
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css ">
</head>
<body>
<script type="text/javascript">
							function validasi_input(apdet){
							if (apdet.no_telp.value==""){
								alert("Nomor Telepon Belum Diisi");
								apdet.no_telp.focus();
								return(false);
							}
							if (apdet.email.value==""){
								alert("Email Belum diisi");
								apdet.email.focus();
								return(false);
							}
							if (apdet.alamat.value==""){
								alert("Alamat Belum diisi");
								apdet.alamat.focus();
								return(false);
							}
							return(true);
							}
							
							</script>
	<div id="main_wrapper">
	
    	 <div width="243" valign="bottom" align="right">
		 <?php include_once("templates/tmp_header.php"); ?>
  		</div>
		<div style="background-color:#CCCCCC; float:left; width:100%; height:47px;" align="center">
        <?php include_once("tmp_nav2.php"); ?>
		</div>
        <div id="content_wrapper">
        	<table>
            	<tr>                	
                    <td valign="top">
                    	<section id="main_content">
                        	<h1 style="color: #0033FF; position:relative; margin-left:50px; margin-top:30px; text-shadow:#6633CC 1px 1px 4px;"> Masukan Data Diri Anda</h1>
                            <br/> 
									<form name="apdet" method="post" action="cetak_struk.php?nod=<?php echo $nod;?>" onSubmit="return validasi_input(this)">
    								<table width="90%" border="0" cellpadding="2" cellspacing="2"  style="margin-left:50px;" >
      								<!-- <tr>
                                    <td colspan="2" width="100%" bgcolor="#444"><div align="center" style="color:#fff;">Nama</div></td>
                                  	</tr> -->
 									<tr>
 		 								<td width="31%" height="40" bgcolor="#444"><div align="right" style="color:#fff; position:relative; right:20px;">Nama &nbsp;&nbsp;:</div></td>
 		  								<td width="69%">
 		    						<div align="left">
        					<?php
    							$pilih=mysqli_query($link,"select * from user where username='$user'");
        						$hasil=mysqli_fetch_assoc($pilih);
        						$nama=$hasil['namalengkap'];
        					?>
 		      					&nbsp;&nbsp;<input name="namanya" type="text" readonly size="50" value="<?php echo $nama;?>" >
 		      						
 														</div></td>
 									</tr>
     								<tr>
 		 								<td width="31%" height="40" bgcolor="#444"><div align="right" style="color:#fff; position:relative; right:20px;">Nomor Telepon &nbsp;&nbsp;:</div>
                                        </td>
 		  								<td width="69%">
 		    						<div align="left">
 		      						&nbsp;&nbsp;<input name="no_telp" type="text"  size="50">
 		      						
 		  												</div></td>
 									</tr>
 	 								<tr>
 		 								<td width="31%" height="40"  bgcolor="#444"><div align="right" style="color:#fff; position:relative; right:20px;">Email &nbsp;&nbsp;:</div></td>
 		  								<td width="69%">
 		    						<div align="left">
 		    						&nbsp;&nbsp;<input name="email" type="email" size="50">
 		      						
 		  												</div></td>
 									</tr>
                      
 	 								<tr>
 									<tr>
 		 								<td width="31%"  bgcolor="#444" valign="top">
										<div align="right" style="color:#fff; position:relative; right:20px;">Alamat Lengkap &nbsp;&nbsp;:
                                        </div></td>
 		  								<td width="69%">
 		    						<div align="left">
 		      						&nbsp;&nbsp;<textarea cols="47" rows="5" name="alamat" ></textarea>
 		      						
 		  												</div></td>
 									</tr>
 									<tr>
 		 								<td width="31%"   bgcolor="#444"><div align="right" style="color:#fff; position:relative; right:20px;">Kota Tujuan &nbsp;&nbsp;:</div>
                                        </td>
 		  								<td width="69%">
 		  							<div align="left">
 		  	 						&nbsp;&nbsp;<select name="kotatujuan" size="1" id="select">
 		  	    					<option value="10000">Jakarta</option>
 		  	    					<option value="12000">Tangerang</option>
 		  	    					<option value="13000">Bogor</option>
 		  	    					<option value="14000">Depok</option>
 		  	    					<option value="15000">Bekasi</option>
 		  	   						<option value="16000">Bandung</option>
									<option value="16000">Yogyakarta</option>
									<option value="16000">Surabaya</option>
									<option value="16000">Solo</option>
 		  	    								</select>
 		  	  						
 		  												</div></td>
 									</tr>
 									<tr>
 		 								<td height="40" colspan="2"><div align="center" style="color:#fff;"><input type="submit"
                                        	value="Selesai dan Cetak Struk" class="btn btn-primary btn-lg"></td>
 									</tr>
    								</table>
								</form>                                          
                        </section>
                    </td>
                </tr>
            </table>
       </div>    
	</div>
    <?php include_once("templates/tmp_footer.php"); ?>
</body>
</html> 