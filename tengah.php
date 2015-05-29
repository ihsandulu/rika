<?php 
require_once('scripts/connect.php');
$query=mysqli_query($link,"SELECT * FROM produk order by id_produk DESC limit 6");
while($data=mysqli_fetch_assoc($query)){
$stok=$data['kuantitas'];
$kodebarang=$data['id_produk'];?>
<div class="barangnya" style="margin:17px;">
	<table width="100px" height="30%" border="0" align="center" cellpadding="3" cellspacing="0" >
		<tr>
			 <td><div align="center" style="width:150px; height:200px;"><img src="products/<?php echo $data['gambar'];?>"  width="100%" height="100%"/></div></td>
		</tr>
		<tr>
		  <td height="50" bgcolor="#FFCCCC"><div align="center"><?php echo $data['nama'];?> - <?php echo 'Rp. ' . number_format( $data['harga'], 0 , '' , '.' )
			 . ',-'; ?></div></td>
		</tr>
		<tr>
			<td height="23"><div align="center">Stok : <?php echo $stok;?></div></td>
		</tr>
		<tr>
			 <?php if (isset($_SESSION['username'])){
                    $user=$_SESSION['username'];
                    
        $sqluser=mysqli_query($link,"SELECT username from user where username='$user'");
        $row=mysqli_num_rows($sqluser);
        $sql=mysqli_fetch_assoc($sqluser);
        $u=$sql['username'];
            }
        ?>
        <form method="post" action="masukkeranjang.php?user=<?php echo $u;?>">
					<td height="23"><div align="center">
	<?php 
		if (!isset($_SESSION['username'])){ 
		echo '<a href="detail_produk.php?id_produk='.$kodebarang.'">DETAIL</a>';
		}else{
		//$stok=0;
		if ($stok<=0){
		echo '<font color="#FF0000">TAK ADA BARANG</font>';
		}else{
			$kueri=mysqli_query($link,"SELECT * from keranjang where id_keranjang='$kodebarang' and username='$user'");
            $cek=mysqli_num_rows($kueri);
            if ($cek > 0){
            echo '<a href="keranjang_belanja.php">KERANJANG</a>';
            }else{
            echo '<input name="id_produk" type="hidden" id="id_produk" value="'.$kodebarang.'" />
                <input name="username" type="hidden" id="username" value="'.$user.'" />
               <input name="jumbel" type="hidden" id="jumbel" value="1" />
               <button type="submit" class="btn btn-primary btn-sm">BELI</button>';
             		}echo ' | <a href="detail_produk.php?id_produk='.$kodebarang.'">DETAIL</a>';
  			 		}
					}
?>
          							</div>
	      </td>
		  </form>
      	</tr>
</table>
</div>
      <?php }?>