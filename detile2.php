<style type="text/css">
        .zoomin {
            cursor: pointer;
        }
        .gh {
            font-size: 24px;
            float: right;
            margin-top: 24px;
        }
        </style>
<?php

$style="";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
///

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
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css ">
</head>
<body>
	<div id="main_wrapper">
    	<?php include_once("templates/tmp_header.php"); ?>
         <tr>
    		<td width="243" valign="bottom"></td>
  		</tr>
        <?php include_once("tmp_nav2.php"); ?>
        <div id="content_wrapper">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            		<td valign="top">
                    	<?php include_once("templates/tmp_left_aside2.php"); ?>                    
                    </td>
                    <td valign="top">
                    	<section id="main_content">
                            <br/>                             
                              <?php 
$id_produk =$_GET['id_produk'];
$tampil ="select*from produk where id_produk='$id_produk'";
$hasil=mysql_query($tampil);
$data=mysql_fetch_array($hasil);


{?>
<table width="100%" border="0">
  <tr>
    <td width="228" rowspan="7"><img src="products/<?php echo $data['gambar']; ?>" width="250" height="250" class="zoomin"></td>
    <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <label></label>
    </form> </td>
  </tr>
  <tr>
    <td width="180">Kode Produk</td>
    <td width="514"><b><?php echo $data['id_produk'];?></b> &nbsp;</td>
  </tr>
  <tr>
    <td>Nama Produk</td>
    <td><b><?php echo $data['nama'];?></b>&nbsp;</td>
  </tr>
  <tr>
    <td>Ukuran</td>
    <td><b><?php echo $data['ukuran'];?></b>&nbsp;</td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><b><?php echo $data['harga'];?></b>&nbsp;</td>
  </tr>
  <tr>
    <td>Stok</td>
    <td><b><?php echo $data['kuantitas'];?></b>&nbsp;</td>
  </tr>
    <td colspan="3"><b><?php echo $data['nama'];?></b> adalah salah satu product terlaris yang pernah di post pada website online store kami.<br/> Dengan high quality material, membuat pemakai terlihat glamor, meskipun ini bukan fashion resmi kami. <br/> <b><?php echo $data['nama'];}?></b> Merupakan fashion icon anak muda yang didesign khusuk untuk penggunanya. you must have!!  </td>
  </tr>
</table>                  
                        </section>
                    </td>
                </tr>
            </table>
       </div>    
	</div>
    <?php include_once("templates/tmp_footer.php"); ?>
    
    <script src="zoomerang.js"></script>
        <script>
            Array.prototype.forEach.call(document.querySelectorAll('p'), function (p, i) {
                p.style.marginLeft = i * 6 + '%'
            })
            Zoomerang
                .config({
                    maxHeight: 600,
                    maxWidth: 600,
                    bgColor: '#000',
                    bgOpacity: .85,
                    onOpen: openCallback,
                    onClose: closeCallback
                })
                .listen('.zoomin')

            function openCallback (el) {
                console.log('zoomed in on: ')
                console.log(el)
            }

            function closeCallback (el) {
                console.log('zoomed out on: ')
                console.log(el)
            }
        </script>
</body>
</html> 

