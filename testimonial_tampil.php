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
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td valign="top">
                    	<?php include_once("templates/tmp_left_aside.php"); ?>                    
                    </td>
      				<td valign="top">
                    	<section id="main_content">
                        	<h2 class="page_title"><font color="#0033FF">Testimonial</font></h2>
                            <br/>
							<?php
								require"scripts/connect.php";
									$code=$_GET['id'];
									$tampil="select*from testimonial where id_testimonial='$code'";
									$hasil=mysqli_query($link,$tampil);
									$data=mysqli_fetch_array($hasil);
									$idp=$data['id_testimonial'];
							?>
								<form action="" method="post" enctype="multipart/form-data">
  									<table width="692" border="0" align="center">
    									<tr>
      										<td >Nama Anggota</td>
                                            <td >:</td>
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
      										<td><label for="deskripsi"></label>
      											<textarea name="deskripsi" readonly id="deskripsi" cols="60" rows="5"><?php echo"$data[testimonial]";?></textarea>        
      											<label for="textfield3"></label></td>
    
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
								</form>
				  </td>
  			</tr>               
       </table>
     </div>    
   </div>
   		 <?php include_once("templates/tmp_footer.php"); ?>
   
</body>
</html>