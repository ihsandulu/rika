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
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">
._css3m{display:none}
</style>
<!-- End css3menu.com HEAD section -->
</head>
<body>
	<div data-role="header" style=" float:inherit; position:relative; background-color:#F6CEF5; height:157px; width:94%; border-radius:10px; margin-left:3%; margin-right:3%; height:125px; top:25px;">
	<?php include_once("templates/tmp_header.php"); ?>
	
	</div>
	
	<div data-role="main" class="ui-content" style="float:left; position:relative; top:80px;">
 
    <table width="100%" border="0"  cellpadding="2" cellspacing="2">
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Ubah Data</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>  <?php
require"../scripts/connect.php";
$tampil="SELECT * FROM admin ORDER by id_admin ASC";
$hasil=mysqli_query($link,$tampil);
$data=mysqli_fetch_assoc($hasil);
?>
	<form id="form1" name="form1" method="post" action="admin_ubah_data_proses.php" onSubmit="return validasi_input(this)">
  		<table width="500" border="0" align="center">
   	 		<tr>
      			<td width="22%" align="left" valign="top">Nama Admin</td>
      			<td width="2%" align="left" valign="top">:</td>
      			<td width="76%" align="left" valign="top"><label>
    		<input name="usertxt" type="text" value="<?php echo $data ['name']; ?>" id="usertxt" />
      </label>
        </span></td>
    		</tr>
    		<tr>
      			<td align="left" valign="top">Password Lama</td>
      			<td align="left" valign="top">:</td>
      			<td align="left" valign="top"><label for="pswlamatxt"></label>
        	<input name="pswlamatxt" type="password" id="pswlamatxt" maxlength="10" />
      </label></td>
    		</tr>
    		<tr>
      			<td align="left" valign="top">Password Baru</td>
     			<td align="left" valign="top">:</td>
      			<td align="left" valign="top"><label for="pswbarutxt"></label>
      		<input name="pswbarutxt" type="password" id="pswbarutxt" maxlength="12" />
      &nbsp;<span class="Font_Info_Psw">*Maksimal 12 karakter</span></span></td>
   			</tr>
    		<tr>
      			<td colspan="3" align="left" valign="top">
      		    <div align="center">
      		      <button type="submit" name="Submit" value="Ubah" class="btn btn-primary btn-lg"/>
      		      <span class="icon-edit"></span> &nbsp;Ubah
      		      </button>
      		      
      		      <button type="reset" name="Submit2" onClick="javascript:history.go(-1)" value="Batal"  class="btn btn-primary btn-lg"/><span class="icon-remove"></span>&nbsp;Batal</button>
   		        </div>
      			
       	      </td>
   			  <td>&nbsp;</td>
  </tr>
</table>
</form></td>
  </tr>
</table>

       <div data-role="footer">
        <?php include_once("templates/tmp_aside.php"); ?>
       
        <?php include_once("templates/tmp_footer.php"); ?>
	  </div>
    </div>
</body>
</html><script type="text/javascript">
							function validasi_input(form1){
							if (form1.pswlamatxt.value==""){
								alert("Kata Sandi Lama Belum Diisi");
								form1.pswlamatxt.focus();
								return(false);
							}
							if (form1.pswbarutxt.value==""){
								alert("Kata Sandi Baru Belum diisi");
								form1.pswbarutxt.focus();
								return(false);
							}
							return(true);
							}
							
							</script>