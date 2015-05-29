<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}
require_once('../scripts/connect.php');
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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Tambah Produk </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> <form action="produk_simpan.php" method="post" enctype="multipart/form-data">
    <table width="100%" cellpadding="7" cellspacing="7" border="0">
      <tr>
      <td align="right" width="140"><label>Nama Produk:</label></td>
      <td align="left"><input type="text" name="nama" id="nama" required autofocus  class="text_input" maxlength="100" style="width:298px;height:15px;padding:3px;resize:none" /></td>
      </tr>
      <tr>
      <td align="right"><label>Merek Produk:</label></td>
      <td align="left"><input type="text" name="merek" id="merek" required autofocus  class="text_input" maxlength="50" style="width:298px;height:15px;padding:3px;resize:none"  /></td>
      </tr>
      <tr>
          <td align="right"><label>Kategori:</label></td>
          <td align="left" valign="top">       
          <label for="kategori"><select name="kategori" id="kategori" required>
<?php 
$kategori="SELECT * FROM `kategori` LEFT JOIN subkategori ON subkategori.kategori_id=kategori.kategori_id LEFT JOIN subsubkategori ON subsubkategori.subkategori_id=subkategori.subkategori_id ORDER BY kategori.kategori_id,subkategori.subkategori_id,subsubkategori.subsubkategori_id";
$qkategori=mysqli_query($link,$kategori);
while($fkategori=mysqli_fetch_assoc($qkategori)){

if(isset($fkategori['subsubkategori_url'])&& $fkategori['subsubkategori_url']!="")
{$val=$fkategori['subsubkategori_url'];$valnama=$fkategori['subsubkategori_nama'];}

elseif(isset($fkategori['subkategori_url'])&& $fkategori['subkategori_url']!="")
{$val=$fkategori['subkategori_url'];$valnama=$fkategori['subkategori_nama'];}

else{$val=$fkategori['kategori_url'];$valnama=$fkategori['kategori_nama'];}
?>

<option value="<?=$val;?>"><?=ucfirst($valnama);?></option>	

<?php }?>	

 </select></label>
                          
		</td>
      </tr>
      
      <tr>
      	<td align="right"><label>Ukuran:</label></td>
      	<td align="left"><input type="text" name="ukuran" id="ukuran" required autofocus  class="text_input" maxlength="50"
        				  style="width:298px;height:15px;padding:3px;resize:none"  /></td>
      </tr>
      <tr>
       	<td align="right"><label>Deskripsi:</label></td>
       <td align="left"><textarea name="deskripsi" id="deskripsi" required autofocus  
       					style="width:300px;height:80px;padding:3px;resize:none"></textarea></td>
      </tr>
      <tr>
     	<td align="right"><label>Harga:</label></td>
        <td align="left"><input type="text" name="harga" id="harga" required autofocus  class="text_input" maxlength="10"
        				  style="width:298px;height:15px;padding:3px;resize:none"  />&nbsp;*Rp        </td>
     </tr>
     <tr>
     	<td align="right"><label>Stok:</label></td>
     	<td align="left"><input type="text" name="kuantitas" id="kuantitas" required autofocus  class="text_input" maxlength="7"
        				  style="width:298px;height:15px;padding:3px;resize:none"  />         </td>
      </tr>
      <tr>
        <td align="right"><label>Gambar:</label></td>
        <td align="left"><label for="kuantitas"></label>
            			 <input type="file" name="gambar" id="gambar" required />        </td>
      </tr>
      <tr>
        <td align="center" >
          </td>
        <td align="center" >&nbsp;<div align="left">
            <button type="submit" name="submit" id="button" value="Tambah Produk" class="btn btn-primary btn-lg"/>                  
            <span class="icon-plus"></span> &nbsp;Tambah Produk
            </button>
            
            <button type="reset" name="submit2" onClick="javascript:history.go(-1)" value="Batal"  class="btn btn-primary btn-lg"/>                  
            <span class="icon-remove"></span>&nbsp;Batal
            </button>
            </div></td>
        <td>&nbsp;</td>
  </tr>
</table>
</form>
</td>
  </tr>
</table>


       <div data-role="footer">
        <?php include_once("templates/tmp_aside.php"); ?>
       
        <?php include_once("templates/tmp_footer.php"); ?>
	  </div>
    </div>
</body>
</html>