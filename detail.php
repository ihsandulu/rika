<?php
require_once("scripts/connect.php");
$tampil=mysqli_query($link,"select*from produk where id_produk='$_GET[id_produk]'");
$isi=mysqli_fetch_assoc($tampil);
if (isset($_SESSION['username'])){
$user=$_SESSION['username'];
}
?>
<h1 style="color: #0033FF;"> Detail Produk</h1><br />
<table width="75%" height="300" border="0">
      <tr>
        <td width="250" rowspan="5"><div align="center"><img src="products/<?php echo $isi['gambar']; ?>" width="100%"></div></td>
        <td width="216" height="30"><div align="left"><h3>Nama: <?php echo $isi['nama']; ?></h3></div></td>
      </tr>
      <tr>
        <td><div align="left"><h3>Kategori: <?php $jenis=$isi['kategori'];
		  	if($jenis=="nike"){
				echo "nike";
			}elseif($jenis=="adidas"){
				echo "adidas";
			}elseif($jenis=="polo"){
				echo "polo";
			}else{
				echo "wanita";
			}				
		  ?></h3></div></td>
      </tr>
      <tr>
        <td><div align="left"><h3>Harga: <?php echo 'Rp. ' . number_format( $isi['harga'], 0 , '' , '.' ) . ',-'; ?></h3></div></td>
      </tr>
      <tr>
        <td><div align="left"><h3>Ukuran: <?php echo $isi['ukuran']; ?></h3></div></td>
      </tr>
      <tr>
        <td><div align="left"><h3>Stok: <?php echo $isi['kuantitas']; ?></h3></div></td>
      </tr>
      <tr>
        <td><div align="center"><h3>
          <?php
          $kodebarang=$isi['id_produk'];
          $deskripsi=$isi['deskripsi'];
          $potong=substr($deskripsi, 0, 50);
        if ($deskripsi==""){
          $potong="-";
        }else{
            $potong=substr($deskripsi, 0, 50);
          } ?>
          <?php echo $potong;?></div></td>
      </tr>
      <tr>
        <td height="59">
<?php
        $username=isset($_SESSION['username']);
        $sqluser=mysqli_query($link,"select username from user where username='$username'");
        $row=mysqli_num_rows($sqluser);
        $sql=mysqli_fetch_assoc($sqluser);
        ?>
        <form method="post" action="masukkeranjang.php?user=<?php echo $sql['username'];?>">
          <div align="center">
            <?php 
      if (!isset($_SESSION['username'])){ 
        echo '<a href="login.php">LOGIN UNTUK MEMBELI KAOS INI</a>';
      }else{
       $kueri=mysqli_query($link,"SELECT * from keranjang where id_keranjang='$kodebarang' and username='$user'");
              $cek=mysqli_num_rows($kueri);
              if ($cek > 0){
                echo '<a href="keranjang_belanja.php">KERANJANG</a>';
              }else{
               echo '<input type="reset" name="Submit2" onclick="javascript:history.go(-1)" value="KEMBALI" />
        			<input name="id_produk" type="hidden" id="id_produk" value="'.$kodebarang.'" />
                <input name="username" type="hidden" id="username" value="'.$user.'" />
               <input name="jumbel" type="hidden" id="jumbel" value="1" />
               <button type="submit">BELI</button>';
             } 
           // echo ' | <a href="detailmainan.php?kodebarang='.$kodebarang.'">DETAIL</a>';
      }
        ?>
            
          </div></form></td>
          
      </tr>
  </table>