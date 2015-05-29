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
    	<div width="243" valign="bottom" align="right">
		 <?php include_once("templates/tmp_header.php"); ?>
  		</div>
		<div style="background-color:#CCCCCC; float:left; width:100%; height:47px;" align="center">
        <?php include_once("tmp_nav2.php"); ?>
		</div>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            		<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                            <br/>  
                           <?php 
   								$target=$_GET['target'];
   								if ($target=='semua' or $target==''){?>
								<p id="slider"><?php include_once("slider.php"); ?></p>
								<?php
								}
									include('merk.php');
								
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