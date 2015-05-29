<h1 style="color: #0033FF; position:relative; margin-left:20px; margin-top:30px; text-shadow:#6633CC 1px 1px 4px;"> Shopping Cart</h1><br />
<table width="1000" border="0">
          <tr>
            <td width="17%" height="35" bgcolor="#0CC"><div align="center">Id Produk</div></td>
            <td width="24%" bgcolor="#0CC"><div align="center">Nama Produk</div></td>
            <td width="11%" bgcolor="#0CC"><div align="center">Harga</div></td>
            <td colspan="3" bgcolor="#0CC"><div align="center">Jumlah Beli</div>
            					              <div align="center"></div>
                                              <div align="center"></div></td>
            <td width="14%" bgcolor="#0CC"><div align="center">Subtotal</div></td>
            <td width="13%" bgcolor="#0CC"><div align="center">Hapus</div></td>
          </tr>
 <?php 
 $username=$_SESSION['username'];
 	$query=mysqli_query($link,"SELECT * FROM keranjang where username='$username' ORDER by id_keranjang ASC");
  $total=0;
	while($data=mysqli_fetch_assoc($query)){
    $kodebarang=$data['id_produk'];
	
$sql=mysqli_query($link,"select *from produk where id_produk='$kodebarang'");
	while($ulang=mysqli_fetch_assoc($sql)){;	
	$nama=$ulang['nama'];
	if($ulang['diskon']==0){$harga=$ulang['harga'];}else{$harga=$ulang['harga']-($ulang['harga']*$ulang['diskon']/100);}
	}
 ?>
      <tr>
        <td bgcolor="#fff"><div align="center"><?php echo $data['id_produk'];?></div></td>
        <td bgcolor="#fff"><div align="center"><?php echo $nama;?></div></td>
        <td bgcolor="#fff"><div align="center"><?php echo $harga;?></div></td>
        <td width="6%" bgcolor="#99FF00">
        <div align="center" style="font-weight:bold; color:#FF0000;"><?php echo $data['jumbel']; ?>&nbsp;</div>
</td>
        <form id="form2" name="form2" method="post" style="display:left;" action="beli_tambah.php?kodebarang=<?php echo $data['id_produk']; ?> "> <td width="4%" align="center" valign="middle">
		            
              <input type="submit" name="button2" id="button2" value="+" style="display:inline-block;" class="btn btn-success btn-sm"/>
              <input type="hidden" name="user" value="<?php echo $user=$data['username'];?>">
            
        
        </td></form><form method="post" action="beli_kurang.php?kodebarang=<?php echo $kodebarang;?>" style="display:left;">
        <td width="4%" align="center" valign="middle">
            
              <input type="submit" name="button3" id="button2" value="-" style="display:inline-block;"  class="btn btn-warning btn-sm"/>
              <input type="hidden" name="uname" value="<?php echo $user;?>" id="uname">
           </div>		</td></form>
        <td bgcolor="#fff"><div align="left">&nbsp;Rp. <?php echo number_format($data['subtotal'],0,',','.').",-"; $total=$total+$data['subtotal'];?></div></td>
        <td bgcolor="#fff"><div align="center"><a href="hapus_belanja.php?kodebarang=<?php echo $kodebarang; ?>"><img src="images/kali.png" /></a></div></td>
      </tr>
     <?php } ?>
     <tr>
    <td height="40" colspan="6" bgcolor="#0CC"><div align="right">TOTAL BELANJA&nbsp;</div></td>
    <td height="40" colspan="2" bgcolor="#0CC"><div align="left"><h3>&nbsp;Rp. <?php echo number_format($total,0,',','.').",-"; ?></h3></strong></div></td>
  </tr>
  <tr>
  <?php
  $sql=mysqli_query($link,"SELECT * FROM keranjang WHERE  username='$username' ORDER by id_produk");
      $cek=mysqli_num_rows($sql);
    if ($cek>0){
      echo '
       <td bgcolor="#fff" height="39" colspan="3"><strong><a href="produk2.php?target=semua">&nbsp; BELI LAGI</a></strong></td>
    <td bgcolor="#fff" colspan="5"><div align="right"><strong><a href="simpan_order.php">SELESAI BELANJA &nbsp;</a></strong></div></td>
      ';
    }else{
      echo ' <td height="39" colspan="8"><strong><a href="produk2.php?target=semua">&nbsp;LIHAT DAFTAR PRODUK</a></strong></td>';
    }
  ?>
  </tr>
    </table>
