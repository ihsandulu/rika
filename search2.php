<?php

$style="";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
///

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bag Shoop</title>
<link rel="shortcut icon" href="products/7.Tas Ransel FDC 014.jpg">
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" media="screen" href="style/white_black.css">
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css ">
</head>
<body>
	<div id="main_wrapper">
    	<?php include_once("templates/tmp_header.php"); ?>
         <tr>
    		<td width="243" valign="bottom"></td>
  		</tr>
        <?php include_once("tmp_nav2.php"); ?>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            		<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                            <br/>                             
                               <?php
$name= $_POST['cari']; //get the nama value from form
$q = "SELECT * from produk where nama like '%$name%' "; //query to get the search result
$hc = mysqli_query($link,$q);
echo "<h4 style=color:#03f;>Hasil Pencarian : </h4>";
$hr=mysqli_num_rows($hc);
if($hr<1){echo "Produk yang anda cari tidak ditemukan.";}
if($hc >=1){
 while($dhc = mysqli_fetch_assoc($hc)){
   echo "<h5 align=left><a href='detail_produk2.php?id_produk=". $dhc["id_produk"]."'> <img src=\"images/icon_search.png\" width=\"10\" height=\"10\">&nbsp;
   ".ucwords($dhc["nama"])."</a></h5>";
  }
}else{
 echo"<p>Produk Tidak Ditemukan</p>";
}

?>                  
                        </section>
                    </td>
                </tr>
            </table>
       </div>    
	</div>
    <?php include_once("templates/tmp_footer.php"); ?>
</body>
</html> 