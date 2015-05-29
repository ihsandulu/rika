
 
<aside id="left_side">

<div id='cssmenu'>
<ul>
<li class='active'><a >Pencarian</a></li>
</ul>
</div>
<div style="position:relative; top:10px;" align="center"  class="input-group">
<form method="post" action="search2.php">
<input align="middle" name="cari" size="28" type="text" placeholder="Pencarian"  style="border-color:#CC3300; border-radius:20px; width:90%; text-align:center; height:20px;" class="form-control" ><span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span></form>
</div>
<br />


<div id='cssmenu'>
<ul id="" class="">
<li class='active'><a >Kategori</a></li>
<?php 
$kategori="SELECT * FROM `kategori` ORDER BY kategori_id";
$qkategori=mysqli_query($link,$kategori);
while($fkategori=mysqli_fetch_assoc($qkategori)){?><li class=""><a href="home.php?target=<?=$fkategori['kategori_url'];?>&kategori=<?=$fkategori['kategori_nama'];?>" style="width:12em;"><?=ucfirst($fkategori['kategori_nama']);?></a>
	<ul id="" class="">
	<?php 
	$kategori_id=$fkategori['kategori_id'];
	$skategori="SELECT * FROM `subkategori` WHERE kategori_id='$kategori_id' ORDER BY subkategori_id";
	$qskategori=mysqli_query($link,$skategori);
	while($fskategori=mysqli_fetch_assoc($qskategori)){?>
		<li class="subkategori" style="background-color:#FF9999">
			<font face="Georgia, Times New Roman, Times, serif" size="9" color="#003366" style="font-size:9px">
				<a href="home.php?target=<?=$fskategori['subkategori_url'];?>&kategori=<?=$fskategori['subkategori_nama'];?>" style="width:12em;">
				<i class="icon-chevron-right"></i> <?=ucfirst($fskategori['subkategori_nama']);?>
				</a>
			</font>
			<ul id="" class="">
			<?php 
			$subkategori_id=$fskategori['subkategori_id'];
			$sskategori="SELECT * FROM `subsubkategori` WHERE subkategori_id='$subkategori_id' ORDER BY subsubkategori_id";
			$qsskategori=mysqli_query($link,$sskategori);
			while($fsskategori=mysqli_fetch_assoc($qsskategori)){?>
				<li class="subkategori" style=" background-color:#FFCCCC">
					<font face="Georgia, Times New Roman, Times, serif" size="9" color="#003366" style="font-size:9px">
						<a href="home.php?target=<?=$fsskategori['subsubkategori_url'];?>&kategori=<?=$fsskategori['subsubkategori_nama'];?>" style="width:12em;">
						&nbsp;&nbsp;&nbsp;<i class="icon-circle-arrow-right"></i> <?=ucfirst($fsskategori['subsubkategori_nama']);?>
						</a>
					</font>
				</li>
			<?php }?>	
			</ul>
		</li>
	<?php }?>	
	</ul>
</li><?php }?>	
</ul>
<ul id="" class="">
	<li class='active'><a >Sale</a></li>
		<ul id="" class="">
	
		<li class="subkategori" style="background-color:#FF9999">
			<font face="Georgia, Times New Roman, Times, serif" size="9" color="#003366" style="font-size:9px">
				<a href="home.php?target=sale&kategori=sale" style="width:12em;">
				<i class="icon-chevron-right"></i> Diskon
				</a>
			</font>			
		</li>
		
		</ul>
	</li>
</ul>
</div>
      
     
      <br/><br/>
       
<div id='cssmenu'>
<ul>
<li class='active'><a >Kalender</a></li>
</ul>
</div>
<?php
$month=date("m");
$year=date("Y");
$day=date("d");
$endDate=date("t",mktime(1,0,0,$month,$day,$year));

?>
<style>
td {
font-family:Georgia, "Times New Roman", Times, serif;
font-size:12px;
}
</style>

<table align="center" border="0" width="210" cellpadding=0 cellspacing=0 style="border:0px solid #CCCCCC; margin-top:2px;">
<tr>
<td colspan="7" align="center" bgcolor="#FFCCCC">
<?=date("D, d M Y ",mktime(0,0,0,$month,$day,$year));?></td>
</tr>
<tr>
  <td colspan="7" align="center">&nbsp;</td>
</tr>
<tr bgcolor="white">
<td align=center><font color=red><b>M</b></font></td>
<td align=center><font color=black><b>S</b></font></td>
<td align=center><font color=black><b>SL</b></font></td>
<td align=center><font color=black><b>R</b></font></td>
<td align=center><font color=black><b>K</b></font></td>
<td align=center><font color=black><b>J</b></font></td>
<td align=center><font color=blue><b>S</b></font></td>
</tr>
<?php
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
?>
<td style="font-family:verdana; font-size:8;color:#B3D9FF" width="15%" align=center valign=middle bgcolor="#FFFFFF" ></td>
<?php
}
for ($d=1;$d<=$endDate;$d++) {

if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; } { $fontColor="black"; }
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }

if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; }
?>
<td style="font-family:verdana;font-size:8;color:#333333" width="15%" align=center valign=middle > <span style="color:$fontColor"><?=$d;?></span></td>
<?php
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}
?>
</table>


<br/>

      <?php if(isset($_SESSION['username'])){
		  $pilih=mysqli_query($link,"select * from keranjang order by id_keranjang asc");
		  $hasil=mysqli_num_rows($pilih);
		  $kosong=$hasil['id_produk'];
		  ?>
		  <div id='cssmenu'>
<ul>
<li class='active'><a >Keranjang Belanja</a></li>
</ul>
</div>
<br/>
<a href="keranjang_belanja.php"><img src="./images/bbuy.png"  align="left"> </a>
		<div style=" font-family:Georgia, 'Times New Roman', Times, serif; font-weight:bold; font-size:12px; position:relative; left:15px;" align="left">
		<a href="keranjang_belanja.php" style="color:#03f; display:left;">		
		Total<br/> Keranjang Anda:<br/><?=$hasil;?> item		</a>		</div>
	<?php  }
	  ?>


      
      

     <div class="banner_adds"></div>    
</aside>
