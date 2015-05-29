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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Ubah Produk</strong></td>

    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td ><?php
require"../scripts/connect.php";
$code=$_GET['id'];
$tampil="select*from produk where id_produk='$code'";
$hasil=mysqli_query($link,$tampil);
$data=mysqli_fetch_assoc($hasil);
$idp=$data['id_produk'];
?>
<form action="produk_ubah_proses.php?id=<?php echo $idp;?>" method="post" enctype="multipart/form-data">
  <table width="692" border="0" align="center">
   
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><label for="nama"></label>
      <input type="text" name="nama" required id="nama" value="<?php echo"$data[nama]"?>"></td>
    </tr>
    <tr>
      <td>Merek</td>
      <td>:</td>
      <td><label for="merek"></label>
      <input type="text" name="merek" required id="merek" value="<?php echo"$data[merek]"?>"></td>
    </tr>
    <tr>
      <td>Kategori</td>
      <td>:</td>
      <td>
	  <label for="kategori">
              <select name="kategori" id="kategori" required>
<?php 
$kategori="SELECT * FROM `kategori` LEFT JOIN subkategori ON subkategori.kategori_id=kategori.kategori_id LEFT JOIN subsubkategori ON subsubkategori.subkategori_id=subkategori.subkategori_id ORDER BY kategori.kategori_id,subkategori.subkategori_id,subsubkategori.subsubkategori_id";
$qkategori=mysqli_query($link,$kategori);
while($fkategori=mysqli_fetch_assoc($qkategori)){

if(isset($fkategori['subsubkategori_nama'])&& $fkategori['subsubkategori_nama']!="")
{$val=$fkategori['subsubkategori_url'];$valnama=$fkategori['subsubkategori_nama'];}

elseif(isset($fkategori['subkategori_nama'])&& $fkategori['subkategori_nama']!="")
{$val=$fkategori['subkategori_url'];$valnama=$fkategori['subkategori_nama'];}

else{$val=$fkategori['kategori_url'];$valnama=$fkategori['kategori_nama'];}
?>

<option value="<?=$val;?>"><?=ucfirst($valnama);?></option>	

<?php }?>	

 </select>
		</label>
      </td>
      </tr>
    <tr>
      <td>Kuantitas</td>
      <td>:</td>
      <td><label for="kuantitas"></label>
      <input type="text" name="kuantitas" required id="kuantitas" value="<?php echo"$data[kuantitas]"?>"></td>
    </tr>
    <tr>
      <td>Ukuran</td>
      <td>:</td>
      <td><label for="ukuran"></label>
      <input type="text" name="ukuran" required id="ukuran" value="<?php echo"$data[ukuran]"?>"></td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>:</td>
      <td><label for="harga"></label>
      <input type="text" name="harga" required id="harga" value="<?php echo"$data[harga]"?>"></td>
    </tr>
    <tr>
      <td>Deskripsi</td>
      <td>:</td>
      <td><label for="deskripsi"></label>
      <textarea name="deskripsi" id="deskripsi" cols="45" rows="5"><?php echo"$data[deskripsi]";?></textarea>        
      <label for="textfield3"></label></td>
    
    </tr>
    <tr>
      <td>Gambar Produk</td>
      <td>:</td>
      <td><label for="fileField"></label>
      <input type="file" name="gambar" id="fileField" required>
      </td>
    </tr>
    <tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><label>
        <button type="submit" name="Submit" value="Ubah" class="btn btn-primary btn-lg" /><span class="ui-icon-edit"></span>Ubah</button>
      
          <button type="reset" name="Submit2" onClick="javascript:history.go(-1)" value="Batal" class="btn btn-primary btn-lg" /><span class="ui-icon-delete"></span>Batal</button>
        </label>
        </span></td>
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