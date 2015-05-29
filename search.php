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
        <?php include_once("tmp_nav.php"); ?>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            		<td valign="top">
                    	<?php include_once("templates/tmp_left_aside.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                            <br/>                             
                               <?php
$name= $_POST['cari']; //get the nama value from form
$q = "SELECT * from produk where nama like '%$name%' "; //query to get the search result
$hc = mysql_query($q);
echo "<h4 style=color:#03f;>Hasil Pencarian : </h4>";

if($hc >=1){
 while($dhc = mysql_fetch_assoc($hc)){
   echo "<h2 align=left><a href='detile.php?id_produk=". $dhc["id_produk"]."'>
   ".ucwords($dhc["nama"])."</a></h2><br>";
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