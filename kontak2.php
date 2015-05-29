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
<style>
input,textarea{
position:relative;
left:10px;
}
</style>
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
                        	<h2 class="page_title"><font color="#0033FF">Kontak Kami</font></h2>
                            <br/>
                            
                             <?php
	  							if (!isset($_SESSION['username'])){?>
								<font color="#000">Silahkan Masuk untuk meghubungi kami</font><p>
								<?php }else{
									$pilih=mysqli_query($link,"select * from user where username='$_SESSION[username]'");
	  								$hasil=mysqli_fetch_array($pilih);
	  								$nama=$hasil['username'];?>
                           		<form name="form1" action="kontak_simpan.php" method="post" enctype="multipart/form-data" 
										onSubmit="return validasi_input(this)">
                            	<table width="100%" cellpadding="7" cellspacing="7" border="0">
                					<tr>
                						<td align="right" width="140"><label>Nama:</label></td>
                   						<td align="left"><input type="text" name="name" id="textfield" readonly value="<?=$nama;?>">
            							<input name="user" type="hidden" value="<?=$user;?>">
										</td>
               						</tr>
               						<tr>
                						<td align="right"><label>Email:</label></td>
                    					<td align="left"><input type="email" name="email" class="" maxlength="80" /></td>
                					</tr>
									<tr>
                						<td align="right"><label>Subyek:</label></td>
                    					<td align="left"><input type="text" name="subyek" class="" maxlength="80" /></td>
                					</tr>
                					<tr>
                						<td align="right"><label>Pesan:</label></td>
                   						<td align="left">
										<textarea name="pesan" rows="4"></textarea>
                                        </td>
               				 		</tr>
                 					<tr>
									<td></td>
            	 						<td align="left"><input type="submit" name="submit" id="button"  class="btn btn-primary btn-lg"
										value="Kirim Pesan"/></td>
    								</tr>
          					  </table>
							  </form>
								<?php }?>
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
<script type="text/javascript">
							function validasi_input(form1){
							if (form1.email.value==""){
								alert("Email belum diisi");
								form1.email.focus();
								return(false);
							}
							if (form1.subyek.value==""){
								alert("Subyek Belum diisi");
								form1.subyek.focus();
								return(false);
							}
							if (form1.pesan.value==""){
								alert("Pesan Belum diisi");
								form1.pesan.focus();
								return(false);
							}
							return(true);
							}
							
							</script>