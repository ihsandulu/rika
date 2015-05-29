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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Testimonial</strong>        	</td>

    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">
      		<div style=" width:100%;overflow:auto">
        	<div style=" height:400px;overflow:auto">
          		<table width="100%" border="0" align="center">
            		<tr align="center">
                        <td width="10">NO </td>
              			<td width="70">Nama Anggota</td>
              			<td width="40">Email</td>             
                      	<td width="300">Testimonial</td>
                        <td width="20">Tampil</td>
                      	<td width="20">Hapus</td>
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
		   require("../scripts/connect.php");
			   $view="select * from testimonial order by id_testimonial asc limit $offset,$dataPerPage";
			   $nourut=0;
			   $hasil=mysqli_query($link,$view) or die("Query Gagal".mysql_error());
		   while($data=mysqli_fetch_assoc($hasil)){
			   $spek=$data['testimonial'];
			   $testi=substr($spek,0,30).' ...';
			   $nourut++;?>
             
		   <tr align=center bgcolor=#EEEEEE>
						<td><?=$nourut;?></td>
						<td><?=$data[username];?></td>
						<td><?=$data[email];?></td>
						<td><?=$testi;?></td>
						<td><a href='testimonial_tampil.php?id=<?=$data[id_testimonial];?>'><img src='../images/edit.png' border='0' title='Edit'></a>
						<td><a href='testimonial_hapus.php?id=<?=$data[id_testimonial];?>'><img src='../images/remove.png' border='0' title='Delete'></a></td>
			  <?php									}
		 ?>
				</table>
               <br/>
               <?php require_once('../scripts/connect.php');
						$dataPerPage = 5;
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM testimonial ";
		$hasil  = mysqli_query($link,$query);
		$data   = mysqli_fetch_assoc($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='testimonial.php?page=".($noPage-1)."' id='prev' style='color:#00CC33;'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='testimonial.php?page=".$page."' style='color:#00CC33;'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='testimonial.php?page=".($noPage+1)."' id='next' style='color:#00CC33;'>Next</a>";
		?>
                      	</div>
        </div>
        </div></td>
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
<script>$(document).ready(function(){$('#testimonial').attr('class','active')});</script>