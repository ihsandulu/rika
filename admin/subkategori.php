<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}
require_once('../scripts/connect.php');

$kategori_id=$_GET['kategori_id'];
$kategori_nama=$_GET['kategori_nama'];
$subkategori_id=$_POST['subkategori_id'];
$subkategori_nama=$_POST['subkategori_nama'];
$subkategori_url=$_POST['subkategori_url'];

if(isset($_POST['subsubkategori'])){header('Location:subsubkategori.php?kategori_id='.$kategori_id.'&kategori_nama='.$kategori_nama.'&subkategori_id='.$subkategori_id.'&subkategori_nama='.$subkategori_nama);}

if(isset($_POST['tambah'])){
$q=mysqli_query($link,"INSERT INTO subkategori (`kategori_id`,`subkategori_nama`, `subkategori_url`) VALUES ('$kategori_id','$subkategori_nama', '$subkategori_url') ");
$q=mysqli_query($link,"UPDATE kategori SET kategori_url='#' WHERE kategori_id='$kategori_id' ");
}
if(isset($_POST['edit'])){
$q=mysqli_query($link,"UPDATE subkategori SET subkategori_nama='$subkategori_nama',subkategori_url='$subkategori_url' WHERE subkategori_id='$subkategori_id'");
}
if(isset($_POST['delete'])){
$q=mysqli_query($link,"DELETE FROM subkategori WHERE subkategori_id='$subkategori_id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8" />
<?php require_once("sisip.php");
?>
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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Sub Kategori <?=ucfirst($kategori_nama);?></strong><a href="kategori.php" style=" float:right; color: #FFFFFF;text-decoration: none" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;Kembali</a></td>
    <td width="6%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle">
	<form method="post" name="form1" id="form1">
	  <table width="100%" border="0" align="center" bgcolor="#CCCCCC">

          <tr align=center bgcolor=#EEEEEE valign="middle">
        
        <td width="251" valign="middle">
          <input name="subkategori_nama" type="text" id="subkategori_nama" placeholder="Nama Kategori">
          <input name="kategori_id" type="hidden" id="kategori_id" value="<?php echo $kategori_id;?>">        </td>
        <td width="308" valign="middle">
          <input name="subkategori_url" type="text" id="subkategori_url" placeholder="URL Kategori">
        </td>
        <td width="256" valign="middle"><button class="btn btn-primary" id="tambah" name="tambah">Tambah Sub Kategori</button></td>
        </tr>
  
    </table></form>
	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    
    <td align="center" valign="middle">
    
    
      <div align="center">
      <div style=" width:100%;overflow:auto">
        <div style=" height:400px;overflow:auto">
          <table width="100%" border="0" align="center">
            <tr align="center" >
              <td width="20" >NO</td>
              <td width="100" >Nama </td>
              <td width="68" >URL</td>
              <td width="40" >Ubah</td>
              <td width="40">Hapus</td>
              <td width="68" >Sub dari Sub Kategori</td>
            </tr>
              <?php 
  					
    			// jumlah data yang akan ditampilkan per halaman    
  					$dataPerPage = 5;
  				// apabila ada parameter, gunakan parameter tersebut,
 				// sedangkan apabila belum, nomor halamannya 1.
  					if(isset($_GET['page']))
  				{
      				$noPage = $_GET['page'];
  				}
  					else $noPage = 1;
  				// perhitungan offset  
 					 $offset = ($noPage - 1) * $dataPerPage;
  				// query SQL untuk menampilkan data perhalaman sesuai offset
  					$tampil= mysqli_query($link,"SELECT * FROM subkategori WHERE kategori_id='$kategori_id' ORDER by subkategori_id ASC LIMIT $offset,$dataPerPage");
  					$nourut=0;
					while($isi=mysqli_fetch_assoc($tampil)){
						$spek=$isi['deskripsi'];
						$pecah=substr($spek,0,30).' ...';
   						$nourut++;?>
						<form method="post">
        	<tr align=center bgcolor=#EEEEEE>
          		<td><?php echo $nourut;?></td>
          		<td><label>
                <input name="subkategori_id" type="hidden" value="<?php echo $isi['subkategori_id'];?>">
                <input name="kategori_id" type="hidden" value="<?php echo $kategori_id;?>">
                <input name="subkategori_nama" type="text" id="subkategori_nama" value="<?php echo $isi['subkategori_nama'];?>">
                </label></td>
                <td>
                  <label>
                  <input name="subkategori_url" type="text" id="subkategori_url" value="<?php echo $isi['subkategori_url'];?>">
                  </label></td>
          		<td><button class="btn btn-primary" id="edit" name="edit"><img src='../images/edit.png' border='0' title='Edit'></button></td>
				<td><button class="btn btn-primary" id="delete" name="delete"><img src='../images/remove.png' border='0' title='Delete'></button></td>
        	    <td><button class="btn btn-primary" id="subsubkategori" name="subsubkategori"><i class="icon-share-alt icon-white"></i></button></td>
        	</tr>
			</form>
        <?php }?>
      </table>
      <br/>
  		<?php
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM subkategori ";
		$hasil  = mysqli_query($link,$query);
		$data   = mysqli_fetch_assoc($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='subkategori.php?page=".($noPage-1)."' id='prev' style='color:#03f;'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='subkategori.php?page=".$page."' style='color:#03f;'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='subkategori.php?page=".($noPage+1)."' id='next' style='color:#03f;'>Next</a>";
		?>
 	</div>
    </div>
	</div>   </td>

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
<script>$(document).ready(function(){$('#kategori').attr('class','active')});</script>