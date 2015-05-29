<?php
session_start();header("location:home.php");
if(ISSET($_SESSION['username'])){
include_once("scripts/connect.php");
include_once("scripts/check_log.php");

}
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
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css">
</head>
<body>
	<div id="main_wrapper">
    	<?php include_once("templates/tmp_header.php"); ?>
        
        <tr>
    		<td width="243" valign="bottom"></td>
        </tr>
        <?php include_once("tmp_nav.php"); ?>
        
    </td>
        
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td valign="top">
                    	<?php include_once("templates/tmp_left_aside.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                        	<div id="newest_products">
                            	 <p id="slider"><?php include_once("slider.php"); ?></p>                                 
          							<?php include_once("tengah.php"); ?>
                             </div>       
                        </section>                                     
                    </td>                   
                </tr>
                 
          	</table>
       	</div> 
	</div>
    <?php include_once("templates/tmp_footer.php"); ?>
</body>
</html> 