<?php
session_start();
require_once('scripts/connect.php');
if (isset($_SESSION['username'])){
$user=$_SESSION['username'];
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
    	 <div width="243" valign="bottom" align="right">
		 <?php include_once("templates/tmp_header.php"); ?>
  		</div>
        <?php include_once("tmp_nav2.php"); ?>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                        	<h2 class="page_title"><font color="#0033FF">Testimonial</font></h2>
                            <br/>
                            <script type="text/javascript">
							function validasi_input(form1){
							if (form1.name.value==""){
								alert("Nama Belum diisi");
								form1.name.focus();
								return(false);
							}
							if (form1.email.value==""){
								alert("Email Belum diisi");
								form1.email.focus();
								return(false);
							}
							if (form1.testimonial.value==""){
								alert("Testimonial Belum diisi");
								form1.testimonial.focus();
								return(false);
							}
							return(true);
							}
							
							</script>
                             <?php
	  							if (!isset($_SESSION['username'])){
								echo ' <font color="#000">Silahkan Masuk untuk menulis testimonial</font><p>';
								}else{
									$pilih=mysqli_query($link,"select * from user where username='$_SESSION[username]'");
	  								$hasil=mysqli_fetch_array($pilih);
	  								$nama=$hasil['username'];
                           		echo '<form name="form1" action="simpan_testimonial.php" method="post" enctype="multipart/form-data" 
										onSubmit="return validasi_input(this)">
                            	<table width="100%" cellpadding="7" cellspacing="7" border="0">
                					<tr>
                						<td align="right" width="140"><label>Nama:</label></td>
                   						<td align="left"><input type="text" name="name" id="textfield" readonly value="'.$nama.'">
            							<input name="user" type="hidden" value="'.$user.'"></td>
               						</tr>
               						<tr>
                						<td align="right"><label>Email:</label></td>
                    					<td align="left"><input type="email" name="email" maxlength="100" /></td>
                					</tr>
                					<tr>
                						<td align="right"><label>Testimonial:</label></td>
                   						<td align="left">
                                        	<textarea name="testimonial" style="width:300px;height:100px;padding:3px;resize:none">
                                        	</textarea>
                                        </td>
               				 		</tr>
                 					<tr>
            	 						<td align="center" colspan="2"><input type="submit" name="submit" id="button" 
										value="Kirim Testimonial"/></td>
    								</tr>
          					  </table>
							  </form>';
								}?>
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