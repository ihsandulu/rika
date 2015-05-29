<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css "> 
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-size: large;
	background-color:#CC0000;
	position:absolute;
}
-->
</style>
<div>
  <h2 class="page_title"><font color="#0033CC"><?=strtoupper($_GET['target']);?></font></h2></div>
<br/>
    <?php 
	require_once('scripts/connect.php');
	$k=$_GET['target'];
	if(isset($_GET['target']) && $_GET['target']!="" && $_GET['target']=="sale"){$kategori=" AND diskon!='0'";}elseif(isset($_GET['target']) && $_GET['target']!="" && $_GET['target']!="semua"){$kategori=" AND kategori='$k'";}else{$kategori="";}
		// jumlah data yang akan ditampilkan per halaman		
	$dataPerPage = 6;
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
	$qnya="SELECT * FROM produk where 1 $kategori ORDER by id_produk DESC LIMIT $offset,$dataPerPage";
	$tampil= mysqli_query($link,$qnya);
	//$query=mysqli_query($link,"SELECT * FROM barang where kategori='musical' order by id limit 0,12");
	$ntampil=mysqli_num_rows($tampil);
	if($ntampil>0){
	while($isi=mysqli_fetch_assoc($tampil)){
		$stok=$isi['kuantitas'];
		 $kodebarang=$isi['id_produk'];?>
      <div class="barangnya" style="margin:17px;"><?php if($isi['diskon']!=0){?><div class="style1"> Diskon <?php echo $isi['diskon'];?>% </div><?php }?>
	<table width="100px" height="30%" border="0" align="center" cellpadding="3" cellspacing="0" >
        <tr>
          <td valign="middle" width="150" height="210" background="products/<?php echo $isi['gambar'];?>" style="background-position:center center; background-repeat:no-repeat; background-size: 100% auto;">
		  <div align="center" style="width:150px; height:210px;" ></div>
		  </td>
        </tr>
        <tr>
          <td height="50"><div align="center" style=" position:relative; top:0px; background-color:#FFCCCC"><?php echo substr($isi['nama'],0,20);?> <div style="font-size:12px;"><div  <?php if($isi['diskon']!=0){?> style="float:left;text-decoration:line-through;"<?php }?>><?php echo 'Rp. ' . number_format( $isi['harga'], 0 , '' , '.' )
			 . ',-'; ?></div><?php if($isi['diskon']!=0){echo 'Rp. ' . number_format( $isi['harga']-( $isi['harga']* $isi['diskon']/100), 0 , '' , '.' )
			 . ',-'; }?></div></div></td>
        </tr>
        <tr>
          <td height="23"><div align="center">Stok : <?php echo $stok;?></div></td>
        </tr>
        <tr>
          <td height="23"><div align="center">
            <?php if (isset($_SESSION['username'])){
                    $user=$_SESSION['username'];
                    
        $sqluser=mysqli_query($link,"SELECT username from user where username='$user'");
        $row=mysqli_num_rows($sqluser);
        $sql=mysqli_fetch_assoc($sqluser);
        $u=$sql['username'];
            }
        ?>
        <form method="post" action="masukkeranjang.php?user=<?php echo $u;?>">
        
            <?php 
      if (!isset($_SESSION['username'])){ 
        echo '<a href="detail_produk2.php?id_produk='.$kodebarang.'">DETAIL</a>';
      }else{
       //$stok=0;
         if ($stok<=0){
           echo '<font color="#FF0000">TAK ADA BARANG</font>';
         }
         else
         {
              $kueri=mysqli_query($link,"SELECT * from keranjang where id_produk='$kodebarang' and username='$user'");
              $cek=mysqli_num_rows($kueri);
              if ($cek > 0){
                echo '<a href="keranjang_belanja.php">KERANJANG</a>';
              }else{
               echo '<input name="id_produk" type="hidden" id="id_produk" value="'.$kodebarang.'" />
                <input name="username" type="hidden" id="username" value="'.$user.'" />
               <input name="jumbel" type="hidden" id="jumbel" value="1" />
               <button type="submit" class="btn btn-primary btn-sm">BELI</button>';
             } 
           echo ' | <a href="detail_produk2.php?id_produk='.$kodebarang.'">DETAIL</a>';
         }
      }
        ?>
        </form>
          </div>          </td>
        </tr>
      </table>
      </div>
      <?php }
	  }else{echo "Silahkan pilih sub kategori dari kategori ".$_GET['kategori'];}?>
      <div class="paging">
		<?php
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM produk where 1 $kategori";
		$hasil  = mysqli_query($link,$query);
		$data   = mysqli_fetch_array($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='produk2.php?target=".$_GET['target']."&page=".($noPage-1)."' id='prev'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='?target=".$_GET['target']."&page=".$page."'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='produk2.php?target=".$_GET['target']."&page=".($noPage+1)."' id='next'>Next</a>";
		?>
</div>