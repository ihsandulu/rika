<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}
require_once('../scripts/connect.php');

$diskon=$_POST['diskon'];
$id_produk=$_POST['id_produk'];
if(isset($_POST['btndiskon'])){
$q=mysqli_query($link,"UPDATE produk SET diskon='$diskon' WHERE id_produk='$id_produk'");
}
if(isset($_POST['btnnodiskon'])){
$q=mysqli_query($link,"UPDATE produk SET diskon='0' WHERE id_produk='$id_produk'");
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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Produk</strong><a href="produk_tambah.php" style=" float:right; color: #FFFFFF;text-decoration: none" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;Tambah Produk</a></td>
    <td width="6%">&nbsp;</td>
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
              <td width="68" >Merek</td>
              <td width="68" >Kategori</td>
              <td width="43" >Ukuran</td>
              <td width="10" >Kuantitas</td>
              <td width="20" >Harga</td>
              <td width="300" >Deskripsi</td>
              <td width="100" >Diskon(dalam %)</td>
              <td width="40" >Ubah</td>
              <td width="40">Hapus</td>
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
  					$tampil= mysqli_query($link,"SELECT * FROM produk ORDER by id_produk ASC LIMIT $offset,$dataPerPage");
  					$nourut=0;
					while($isi=mysqli_fetch_assoc($tampil)){
						$spek=$isi['deskripsi'];
						$pecah=substr($spek,0,30).' ...';
   						$nourut++;?>
        	<tr align=center bgcolor=#EEEEEE>
          		<td><?php echo $nourut;?></td>
          		<td><?php echo $isi['nama'];?></td>
                <td><?php echo $isi['merek'];?></td>
          		<td><?php echo $isi['kategori'];?></td>
          		<td><?php echo $isi['ukuran'];?></td>
                <td><?php echo $isi['kuantitas'];?></td>
          		<td><?php echo $isi['harga'];?></td>         		
                <td><?php echo $pecah; ?></td>
                <td >
				<form name="form1" method="post" action="">
                 <input name="id_produk" type="hidden" id="id_produk" value="<?=$isi['id_produk'];?>">
                   <div class="input-append"> <?php if($isi['diskon']==0){$dsb="";}else{$dsb="disabled=\"disabled\"";}?>
				    <input name="diskon" type="text" class="span1" id="diskon" value="<?=$isi['diskon'];?>" <?=$dsb;?>  >
				    <?php if($isi['diskon']==0){?>	
                  <input name="btndiskon" type="submit" id="btndiskon" value="Disc." class="btn btn-primary btn-sm"  >
				  <?php }else{?>
                  <input name="btnnodiskon" type="submit" id="btnnodiskon" value="No Disc." class="btn btn-danger btn-sm" >
					<?php }?>
					</div>                    
                </form>                </td>
                <td><a href='produk_ubah.php?id=<?php echo $isi['id_produk'] ;?>'><img src='../images/edit.png' border='0' title='Edit'></a></td>
				<td><a href='produk_hapus.php?id=<?php echo $isi['id_produk'] ;?>'><img src='../images/remove.png' border='0' title='Delete'></a></td>
        	</tr>
        <?php }?>
      </table>
      <br/>
  		<?php
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM produk ";
		$hasil  = mysqli_query($link,$query);
		$data   = mysqli_fetch_assoc($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='produk.php?page=".($noPage-1)."' id='prev' style='color:#03f;'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='produk.php?page=".$page."' style='color:#03f;'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='produk.php?page=".($noPage+1)."' id='next' style='color:#03f;'>Next</a>";
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
<script>$(document).ready(function(){$('#produk').attr('class','active')});</script>