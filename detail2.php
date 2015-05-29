<?php
require_once("scripts/connect.php");
$tampil=mysqli_query($link,"select*from produk where id_produk='$_GET[id_produk]'");
$isi=mysqli_fetch_assoc($tampil);
if (isset($_SESSION['username'])){
$user=$_SESSION['username'];
}
?>
<style>
.detail{
font-size:26px;
}
.style2 {color: #000066; }
.style3 {color: #920510}
</style>
<h1 style="color: #0033FF;"> Detail Produk</h1><br />

<table width="100%" height="300" border="0" >
      <tr>
        <td width="46%" rowspan="5" align="center"><div align="center" class="thumbnail" style="width:70%"><img src="products/<?php echo $isi['gambar']; ?>" width="100%"></div></td>
        <td width="1%" bgcolor="#E6E6E6">&nbsp;</td>
        <td width="25%" height="30"><div align="left" class="style2" id="detail" style="font-size:18px; position:relative; left:20px;" >Nama: </div></td>
        <td width="28%"><div class="style3" id="detail" style="font-size:18px; position:relative; left:10px;"><?php echo $isi['nama']; ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6">&nbsp;</td>
        <td><div align="left" class="style2" id="detail" style="font-size:18px; position:relative; left:20px;">Kategori: 
          
        </div></td>
        <td><div class="style3" id="detail" style="font-size:18px; position:relative; left:10px;"><?php $jenis=$isi['kategori'];
		  	if($jenis=="nike"){
				echo strtoupper("nike");
			}elseif($jenis=="adidas"){
				echo strtoupper("adidas");
			}elseif($jenis=="polo"){
				echo strtoupper("polo");
			}else{
				echo strtoupper("wanita");
			}				
		  ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6">&nbsp;</td>
        <td><div align="left" class="style2" id="detail" style="font-size:18px; position:relative; left:20px;">Harga: </div></td>
        <td><div class="style3" id="detail" style="font-size:18px; position:relative; left:10px;"><div style="font-size:18px;"><div  <?php if($isi['diskon']!=0){?> style="float:left;text-decoration:line-through;"<?php }?>><?php echo 'Rp. ' . number_format( $isi['harga'], 0 , '' , '.' )
			 . ',-'; ?></div><br/><?php if($isi['diskon']!=0){echo 'Rp. ' . number_format( $isi['harga']-( $isi['harga']* $isi['diskon']/100), 0 , '' , '.' )
			 . ',-'; }?></div></div></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6">&nbsp;</td>
        <td><div align="left" class="style2" id="detail" style="font-size:18px; position:relative; left:20px;">Ukuran: </div></td>
        <td><div class="style3" id="detail" style="font-size:18px; position:relative; left:10px;"><?php echo $isi['ukuran']; ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#E6E6E6">&nbsp;</td>
        <td><div align="left" class="style2" id="detail" style="font-size:18px; position:relative; left:20px;">Stok: </div></td>
        <td><div class="style3" id="detail" style="font-size:18px; position:relative; left:10px;"><?php echo $isi['kuantitas']; ?></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><div align="center" style="font-size:18px; position:relative; left:0px; padding:10px; border-radius:20px; border-color:#66CCFF; border-style:inset; background-color:#CCCCCC;">
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
		  <td></td>
		  <td></td><td></td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td >
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
               echo '<input type="reset" name="Submit2" onclick="javascript:history.go(-1)" value="KEMBALI"  class="btn btn-primary btn-lg"/>
        			<input name="id_produk" type="hidden" id="id_produk" value="'.$kodebarang.'" />
                <input name="username" type="hidden" id="username" value="'.$user.'" />
               <input name="jumbel" type="hidden" id="jumbel" value="1" />
               <button type="submit" class="btn btn-primary btn-lg">BELI</button>';
             } 
           // echo ' | <a href="detailmainan.php?kodebarang='.$kodebarang.'">DETAIL</a>';
      }
        ?>
          </div></form></td>
        <td></td>
        <td></td><td></td>
      </tr>
</table>
