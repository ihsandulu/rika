<?php

$style="";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
//////////////////////////////////////

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
    	 <div width="243" valign="bottom" align="right">
		 <?php include_once("templates/tmp_header.php"); ?>
  		</div>
		<div style="background-color:#CCCCCC; float:left; width:100%; height:47px;" align="center">
        <?php include_once("tmp_nav2.php"); ?>
		</div>
      
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                        	<h2 class="page_title"><font color="#663366">Masuk</font></h2>
                            <br/>
                           <form id="form2" name="form2" method="post" action="login_proses.php">
      							<table width="60%" border="0" cellpadding="0" cellspacing="0 " class="login">
       								 <tr>
          								<td height="41" colspan="2" bgcolor="#663366"><div align="center" style="color:#FFFFFF;">Silahkan Masuk untuk berbelanja</div>
                                        </td>
        							</tr>
									<tr><td colspan="2" >&nbsp;</td></tr>
        							<tr>
          								<td width="98" height="40"><div align="center">Nama Anggota</div></td>
          								<td width="179"><label for="username"></label>
            								<div align="left">
              						<input type="text" name="username" id="username" required />
            								</div></td>
        							</tr>
        							<tr>
          								<td height="36"><div align="center">Kata Sandi</div></td>
          								<td><div align="left">
            						<input type="password" name="password" id="textfield" required />
          								</div></td>
        							</tr>
        							<tr>
          								<td height="31"><div align="center"></div></td>
          								<td><div align="left">
            						<input type="submit" name="button2" id="button2" value="MASUK" class="btn btn-primary btn-md"/>
            							</div></td>
        							</tr>
									<tr><td colspan="2" >&nbsp;</td></tr>
        							<tr>
          								<td height="33" colspan="2" bgcolor="#663366"><div align="center" style="color:#FFFFFF;">Belum punya akun ? Daftar di
                                        <a href="daftar.php" style=" color:#FF9933"> sini</a><br />
         								</div></td>
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