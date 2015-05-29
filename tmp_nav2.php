<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="styles.css">

<!-- Start css3menu.com HEAD section -->
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<!-- End css3menu.com HEAD section -->


<!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu" style="position:relative; top:3px;">
<input type="checkbox" id="css3menu-switcher" class="switchbox">
	<label onClick="" class="switch" for="css3menu-switcher"></label>	
	<li class="topfirst"><a href="index.php" style="height:18px;line-height:18px; width:9em;">Beranda</a></li>
	<li class="topmenu"><a href="home.php?target=semua" style="height:18px;line-height:18px; width:9em;">Produk</a></li>
	<li class="topmenu"><a href="cara_pembelian2.php" style="height:18px;line-height:18px; width:9em;">Cara Pembelian</a></li>
	<li class="topmenu"><a href="profil2.php" style="height:18px;line-height:18px; width:9em;">Profil</a></li>
	<li class="topmenu"><a href="kontak2.php" style="height:18px;line-height:18px; width:9em;">Kontak</a></li>
	<!--<li class="topmenu"><a href="testimonial2.php" style="height:18px;line-height:18px; width:8em;">Testimonial</a></li>-->
<?php	if(ISSET($_SESSION['username'])){?>
<li class="toplast"><a href="keluar.php" style="height:18px;line-height:18px; width:7.8em;">LogOut</a></li>
<?php }else{?>
<li class="toplast"><a href="login.php" style="height:18px;line-height:18px; width:7.8em;">LogIn</a></li>
<?php }?>
	
</ul>
<!-- End css3menu.com BODY section -->


