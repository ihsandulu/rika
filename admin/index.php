<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}
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
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->
</head>
<body>

	<div id="main_wrapper" class="container ">
	<div data-role="header" style=" float:inherit; position:relative; background-color:#F6CEF5; height:157px; width:94%; border-radius:10px; margin-left:3%; margin-right:3%; height:125px; top:25px;">
	<?php include_once("templates/tmp_header.php"); ?>
	
	</div>
	
	<div data-role="main" class="ui-content" style="float:inherit; position:relative; top:50px;">
        <section id="main_content">
  			<marquee behavior="scroll" direction="left" scrolldelay="20"><h2>Selamat Datang Di Halaman Administrator</h2></marquee>
          	<p>Ini adalah area kerja khusus untuk anda menginput seluruh Data</p>
  <p>mulai dari Data Barang, Data Pesanan, Customer dan Laporan Penjualan.DLL</p>
  <p>Selamat Bekerja :D </p>
    	</section>
		</div>
		
		<div data-role="footer">
        <?php include_once("templates/tmp_aside.php"); ?>
       
        <?php include_once("templates/tmp_footer.php"); ?>
		</div>
		
     </div>
</body>
</html>
<script>$(document).ready(function(){$('#beranda').attr('class','active')});</script>