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
    <td width="50%" class="badge"><strong>Data Admin</strong></td>
    <td width="44%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table align="center" width="100%" border="1" cellpadding="0" cellspacing="0" bgcolor="#03f">
 
  <tr>
    <th width="20" align="center" scope="col" >ID</th>
    <th width="40" align="center" scope="col">Nama Admin</th>    
    <th width="20" align="center" scope="col">Ubah</th>
</tr>

<?php
	require("../scripts/connect.php");
		$query = "select * from admin order by id_admin asc";
		$hasil = mysqli_query($link, $query);
	while ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC)){?>
	<tr>
				<td align="center" width="20" bgcolor="#FFFFFF"><?=$data['id_admin'];?></td>
				<td align="center" width="40" bgcolor="#FFFFFF"><?=$data['name'];?></td>
				<td align="center" width="20" bgcolor="#FFFFFF"><a href="admin_ubah_data.php?user=$data[name]"><img width="15" 		
				src="../images/edit.png" height="15" border="0" valign="middle"></td>
		 </tr>

<?php		}

?>
</table></td>
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
<script>$(document).ready(function(){$('#admin').attr('class','active')});</script>