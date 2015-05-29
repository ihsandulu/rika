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
        <?php include_once("tmp_nav2.php"); ?>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                  
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                        	<h2 class="page_title"><font color="#0033CC">Buat Akun Anda</font></h2>
                            <script type="text/javascript">
							function validasi_input(form1){
							if (form1.username.value==""){
								alert("Nama Anggota Belum diisi");
								form1.username.focus();
								return(false);
							}
							if (form1.password.value==""){
								alert("Kata Sandi Belum diisi");
								form1.password.focus();
								return(false);
							}
							if (form1.konfirmasi.value==""){
								alert("Ulangi Kata Sandi Belum diisi");
								form1.konfirmasi.focus();
								return(false);
							}
							if (form1.namalengkap.value==""){
								alert("Nama Lengkap Belum diisi");
								form1.namalengkap.focus();
								return(false);
							}
							return(true);
							}
							
							</script>
                   	      <form name="form1" method="post" action="daftar_proses.php" onSubmit="return validasi_input(this)">
                          <table width="80%" border="0" cellpadding="0" cellspacing="0 " class="login">
        						<tr>
         							<td height="41" colspan="2" bgcolor="#03f"><div align="center" style="color:#FFFFFF">Silahkan isi formulir untuk mendaftar menjadi anggota</div></td>
        						</tr>
								<tr>
         							<td  colspan="2" >&nbsp;</td>
        						</tr>

        						<tr>
          							<td width="98" height="40"><div align="center">Nama Anggota</div></td>
          							<td width="179"><label for="username"></label>
            						<div align="center">
             			   		 <input type="text" name="username" id="username" />
            		   				</div></td>
       							</tr>
        						<tr>
                                    <td height="36"><div align="center">Kata Sandi</div></td>
                                    <td><div align="center">
            					 <input type="password" name="password" id="textfield" />
          							</div></td>
       							</tr>
        						<tr>
          							<td height="38"><div align="center">Ulangi Kata Sandi</div></td>
          							<td><span id="sprypassword1">
            					<label for="password1"></label>
            						<div align="center">
             					<label for="textfield"></label>
              					<label for="textfield3"></label>
              					<input type="password" name="konfirmasi" id="textfield3" />
            						</div>
            						</span>
            					<label for="textfield"></label>
            						<div align="center"></div></td>
        						</tr>
        						<tr>
          							<td height="40"><div align="center">Nama Lengkap</div></td>
          							<td><label for="textfield2"></label>
           							<div align="center">
              					<input type="text" name="namalengkap" id="textfield2"  />
            						</div></td>
        						</tr>
        						<tr>
          							<td height="31"><div align="center"></div></td>
          							<td><div align="center">
            					<input type="submit" name="button2" id="button2" value="DAFTAR" class="btn btn-primary btn-lg"/>
          							</div></td>
        						</tr>
								<tr>
         							<td  colspan="2" >&nbsp;</td>
        						</tr>
        						<tr>
          							<td height="33" colspan="2" bgcolor="#03f"><div align="center" style="color:#FFFFFF">Sudah punya akun? masuk di<a href="login.php" style=" color:#66FFFF;"> sini</a><br />
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