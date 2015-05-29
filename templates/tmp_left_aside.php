<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>css3menu.com</title>
		<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menuver_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->	
</head>

<br />
<aside id="left_side">
<div class="title_box"><font color="#000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pencarian</font></div> 
<form method="post" action="search.php">
<input name="cari" size="28" type="text" placeholder="Pencarian"></form>
<br />
    <div class="title_box"><font color="#000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kategori</font></div>    
      <ul id="css3menu1" class="topmenu">
<input type="checkbox" id="css3menu-switcher" class="switchbox"><label onclick="" class="switch" for="css3menu-switcher"></label>	<li class="topfirst"><a href="produk.php?target=nike" style="width:12em;">Nike</a></li>
	<li class="toplast"><a href="produk.php?target=adidas" style="width:12em;">Adidas</a></li>
    <li class="toplast"><a href="produk.php?target=polo" style="width:12em;">Polo</a></li>
    <li class="toplast"><a href="produk.php?target=wanita" style="width:12em;">Wanita</a></li>
</ul>
</ul>
      
     
      <br/><br/><br/>
       
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center" >
<tr> 
	<td width="88%" bgcolor="#fff" ><div align="center"><strong><font face="verdana" size="2" color="#000"><h3 class="page_tittle" >&nbsp;&nbsp;Kalender</h3></font></strong></div></td>
</tr></table><br>
<?php
$month=date("m");
$year=date("Y");
$day=date("d");
$endDate=date("t",mktime(1,0,0,$month,$day,$year));

echo '
<style>
td {
font-size:12;
font-family:verdana;
}
</style>
';

echo '<table align="center" border="0" width="210" cellpadding=3 cellspacing=1><tr><td align=center>';
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table>';

echo '
<table align="center" border="0" width="210" cellpadding=0 cellspacing=0 style="border:0px solid #CCCCCC">
<tr bgcolor="white">
<td align=center><font color=red><b>M</b></font></td>
<td align=center><font color=black><b>S</b></font></td>
<td align=center><font color=black><b>SL</b></font></td>
<td align=center><font color=black><b>R</b></font></td>
<td align=center><font color=black><b>K</b></font></td>
<td align=center><font color=black><b>J</b></font></td>
<td align=center><font color=blue><b>S</b></font></td>
</tr>
';

$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"15%\" align=center valign=middle bgcolor=\"#FFFFFF\" >
</td>";
}
for ($d=1;$d<=$endDate;$d++) {

if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; } { $fontColor="black"; }
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }

if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; }

echo "<td style=\"font-family:arial;color:#333333\" width=\"15%\" align=center valign=middle > <span style=\"color:$fontColor\">$d</span></td>";
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}
echo '</table>';
?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="197" align="center">
      <h3 class="page_tittle" align="center">&nbsp;&nbsp;Keranjang Belanja</h3><br/>
      <a href="keranjang_belanja.php"><img width="150" src="./images/bbuy.png" align="right"> </a>
      <?php if(isset($_SESSION['username'])){
		  $pilih=mysqli_query($link,"select * from keranjang order by id_keranjang asc");
		  $hasil=mysqli_num_rows($pilih);
		  $kosong=$hasil['id_produk'];
		echo '<center><a href="keranjang_belanja.php" style="color:#03f; display:inline-block;"><div style="font-weight:bold;">Total Keranjang Anda: '.$hasil.' item </a></center>';
	  }
	  ?>
      </table>

      
      

     <div class="banner_adds"></div>    
                                    
</aside>
