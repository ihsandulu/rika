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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Testimonial</strong></td>

    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td><?php
require"../scripts/connect.php";
$code=$_GET['id'];
$tampil="select*from testimonial where id_testimonial='$code'";
$hasil=mysqli_query($link,$tampil);
$data=mysqli_fetch_assoc($hasil);
$idp=$data['id_testimonial'];
?>
<form action="" method="post" enctype="multipart/form-data">
  <table width="692" border="0" align="center">
    <tr>
      <td width="100">Nama Anggota</td>
      <td width="10">:</td>
      <td><?php echo"$data[username]"?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><?php echo"$data[email]"?></td>
    </tr>
    <tr>
      <td>Testimonial</td>
      <td>:</td>
      <td><label for="deskripsi">
      <textarea name="deskripsi" readonly id="deskripsi" cols="60" rows="5"><?php echo"$data[testimonial]";?></textarea>        
      </label></td>
    
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">
        <label>
          <input type="reset" name="Submit2" onClick="javascript:history.go(-1)" value="Kembali" />
        </label>
       </td>
    </tr>
  </table>
  
</form></td>
    <td>&nbsp;</td>
  </tr>
</table>



       <div data-role="footer">
        <?php include_once("templates/tmp_aside.php"); ?>
       
        <?php include_once("templates/tmp_footer.php"); ?>
	  </div>
    </div>
</body>
</html>