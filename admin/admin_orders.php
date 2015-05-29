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
    <td width="88%" bgcolor="#999999"  style="border-radius:50px; padding-left:15px; padding-right:15px; color:#FFFFFF; text-shadow:#000000 1px 1px 3px;"><strong>Data Orders</strong>      </td>

    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> <table width="100%" border="1" class="kaos">
        <tr>
          <td width="9%"><div align="center">No.</div></td>
          <td width="19%"><div align="center">No. Order</div></td>
          <td width="15%"><div align="center">Tanggal Order</div></td>
          <td width="14%"><div align="center">Total Order</div></td>
          <td width="14%"><div align="center">Status Order</div></td>
          <td width="14%"><div align="center">Aksi</div></td>
        </tr>
        <?php 
  			require_once('../scripts/connect.php');
    		// jumlah data yang akan ditampilkan per halaman    
  				$dataPerPage = 20;
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
  				$tampil= mysqli_query($link,"SELECT * FROM transaksi_detail ORDER by no_transaksi ASC LIMIT $offset,$dataPerPage");
	
  				$nourut=0;
			while($isi=mysqli_fetch_assoc($tampil)){
		
   				$nourut++;?>
        <tr>
          <td bgcolor="#EEEEEE"><div align="center"><?php echo $nourut;?></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><?php echo $isi['no_transaksi'];?></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><?php echo $isi['tgl_transaksi'];?></div></td>
          <td bgcolor="#EEEEEE"><div align="center">Rp.&nbsp;<?php echo number_format($isi['total'],0,',','.').",-";?></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><?php echo $isi['status_pesanan'];?></div></td>
          <td bgcolor="#EEEEEE"><div align="center"><a href="admin_detail_orders.php?id=<?php echo $isi['no_transaksi'] ;?>"><img src='../images/edit.png' border='0' title='Edit'></a> |
          <a href="admin_hapus_orders.php?id=<?php echo $isi['no_transaksi'] ;?>"><img src='../images/remove.png' border='0' title='Delete'></a></div></td>
        </tr>
        <?php }?>
      
      </table><p>
	<div class="paging">
		<?php
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM transaksi_detail ";
		$hasil  = mysqli_query($link,$query);
		$data   = mysqli_fetch_array($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='admin_orders.php?page=".($noPage-1)."' id='prev' style='color:#00CC33;'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='admin_orders.php?page=".$page."' style='color:#00CC33;'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='admin_orders.php?page=".($noPage+1)."' id='next' style='color:#00CC33;'>Next</a>";
		?>
	</div>
		<p align="center" style="line-height:0;color:#00CC33;">&nbsp;</p>
    <div align="center"></div></td>
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
<script>$(document).ready(function(){$('#order').attr('class','active')});</script>