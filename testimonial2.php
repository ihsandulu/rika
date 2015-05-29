<?php
session_start();
require_once('scripts/connect.php');
if (isset($_SESSION['username'])){
$user=$_SESSION['username'];
}
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
                        	<h2 class="page_title"><font color="#0033FF">Testimonial</font></h2>
                            <br/>
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
  $tampil= mysqli_query($link,"SELECT * FROM testimonial ORDER by id_testimonial DESC LIMIT $offset,$dataPerPage");
  //$query=mysqli_query($link,"SELECT * FROM barang where kategori='musical' order by id limit 0,12");
  $tampiluser= mysqli_query($link,"select * from user");
  while($show=mysqli_fetch_assoc($tampiluser)){
	  $nama=$show['namalengkap'];
	  
	  }
  while($isi=mysqli_fetch_assoc($tampil)){
	  $spek=$isi['testimonial'];
	  $testi=substr($spek,0,30).' ...';
	  $id=$isi['id_testimonial'];
	  $tgl=$isi['tanggal'];
	  $nama=$isi['username'];?>

	<table width="90%" border="0" cellpadding="3" cellspacing="3">
		  <tr>
		  <td style="color:#000" bgcolor="#CCCCCC">&nbsp;<b>Nama</b> : <?=$nama;?></td>
		  </tr>
          <tr>
            <td height="34" colspan="2"  style="padding:5px;"><b>Testimonial</b> : <?=$testi;?> &nbsp;&nbsp;&nbsp;
          <a href="testimonial_tampil2.php?id=<?=$id;?>">Tampil Testimonial</a></td>
		  </tr>
        </table><?php }?>
        <p>
        <div class="paging">
    <?php
    // mencari jumlah semua data dalam tabel
    $query  = "SELECT COUNT(*) AS jumData FROM testimonial";
    $hasil  = mysqli_query($link,$query);
    $data   = mysqli_fetch_array($hasil);
    $jumData = $data['jumData'];  
    // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
    $jumPage = ceil($jumData/$dataPerPage); 
    $showPage=0;

    echo "Page $noPage of $jumPage :  ";
    //menampilkan link Previous  
    if ($noPage > 1) echo "<a href='testimonial2.php?&page=".($noPage-1)."' style='color:#00CC33' id='prev '>Prev&nbsp;</a>";
    //menampilkan urutan paging 
    for($page = 1; $page <= $jumPage; $page++)
    {
             if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
             {
                if (($showPage == 1) && ($page != 2))  echo "... ";
                if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
                if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
                else echo "<a href='testimonial2.php?&page=".$page."' style='color:#00CC33'>".$page."</a> ";
                $showPage = $page;
             }
    }
    //menampilkan link Next
    if ($noPage < $jumPage) echo "<a href='testimonial2.php?&page=".($noPage+1)."' id='next' style='color:#00CC33'>Next</a>";
	
    ?>
    </div>
                           
                      </section>
                    </td>
                    <td valign="top">                    	
                      <div>
							<a href="form_testimonial2.php"  style=" color:blue;font-family: 'Comic Sans MS', cursive; text-decoration:none">
                            <br/>Isi testimonial</a>
					  </div>                     
                     </td>
                </tr>
            </table>
       </div>    
	</div>
   		 <?php include_once("templates/tmp_footer.php"); ?>
</body>
</html> 