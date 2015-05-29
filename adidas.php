<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css "> 
<div>
  <h2 class="page_title"><font color="#0033CC">Tas Adidas</font></h2></div>
<br/>
    <?php 
	require_once('scripts/connect.php');
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
	$tampil= mysql_query("SELECT * FROM produk where kategori='adidas' ORDER by id_produk DESC LIMIT $offset,$dataPerPage");
	//$query=mysql_query("SELECT * FROM barang where kategori='musical' order by id limit 0,12");
	
	while($isi=mysql_fetch_assoc($tampil)){
		$stok=$isi['kuantitas'];
		 $kodebarang=$isi['id_produk'];?>
      <span class="barangnya">
      <table width="172" height="260" border="1">
        <tr>
          <td width="200" height="150"><div align="center"><img src="products/<?php echo $isi['gambar'];?>" height="150"/></div></td>
        </tr>
        <tr>
          <td height="24"><div align="center"><?php echo $isi['nama'];?> - <?php echo 'Rp. ' . number_format( $isi['harga'], 0 , '' , '.' ) . ',-'; ?></div></td>
        </tr>
        <tr>
          <td height="23"><div align="center">Stok : <?php echo $stok;?></div></td>
        </tr>
        <tr>
          <td height="23"><div align="center">
            <?php if (isset($_SESSION['username'])){
                    $user=$_SESSION['username'];
                    
        $sqluser=mysql_query("SELECT username from user where username='$user'");
        $row=mysql_num_rows($sqluser);
        $sql=mysql_fetch_assoc($sqluser);
        $u=$sql['username'];
            }
        ?>
        <form method="post" action="masukkeranjang.php?user=<?php echo $u;?>">
        
            <?php 
      if (!isset($_SESSION['username'])){ 
        echo '<a href="detail_produk.php?id_produk='.$kodebarang.'">DETAIL</a>';
      }else{
       //$stok=0;
         if ($stok<=0){
           echo '<font color="#FF0000">TAK ADA BARANG</font>';
         }
         else
         {
              $kueri=mysql_query("SELECT * from keranjang where id_produk='$kodebarang' and username='$user'");
              $cek=mysql_num_rows($kueri);
              if ($cek > 0){
                echo '<a href="keranjang_belanja.php">KERANJANG</a>';
              }else{
               echo '<input name="id_produk" type="hidden" id="id_produk" value="'.$kodebarang.'" />
                <input name="username" type="hidden" id="username" value="'.$user.'" />
               <input name="jumbel" type="hidden" id="jumbel" value="1" />
               <button type="submit">BELI</button>';
             } 
           echo ' | <a href="detail_produk.php?id_produk='.$kodebarang.'">DETAIL</a>';
         }
      }
        ?>
        </form>
          </div>
          </td>
        </tr>
      </table>
      </span>
      <?php }?>
      <div class="paging">
		<?php
		// mencari jumlah semua data dalam tabel
		$query  = "SELECT COUNT(*) AS jumData FROM produk where kategori='adidas'";
		$hasil  = mysql_query($query);
		$data   = mysql_fetch_array($hasil);
		$jumData = $data['jumData'];  
		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data  
		$jumPage = ceil($jumData/$dataPerPage); 
		$showPage=0;

		echo "Page $noPage of $jumPage :  ";
		//menampilkan link Previous  
		if ($noPage > 1) echo "<a href='produk.php?target=adidas&page=".($noPage-1)."' id='prev'>Prev&nbsp;</a>";
		//menampilkan urutan paging 
		for($page = 1; $page <= $jumPage; $page++)
		{
		         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
		         {
		            if (($showPage == 1) && ($page != 2))  echo "... ";
		            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "... ";
		            if ($page == $noPage) echo "<span class='now'> " .$page. " </span>";
		            else echo "<a href='adidas.php?target=adidas&page=".$page."'>".$page."</a> ";
		            $showPage = $page;
		         }
		}
		//menampilkan link Next
		if ($noPage < $jumPage) echo "<a href='produk.php?target=adidas&page=".($noPage+1)."' id='next'>Next</a>";
		?>
		</div>