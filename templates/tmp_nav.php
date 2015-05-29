 <nav id="main_menu">
        	<a href="index.php"><div id="page">Beranda</div></a>
            <a href="produk.php?target=semua"><div id="page">Produk</div></a>
            <a href="cara_pembelian.php"><div id="page">Cara Pembelian</div></a>
            <a href="profil.php"><div id="page">Profil</div></a>
            <a href="kontak.php"><div id="page">Kontak</div></a>
            <a href="testimonial.php"><div id="page">Testimonial</div></a>
			<?php if (!isset($_SESSION['username'])){
    			echo "<div id='page' align='center'><a href='login.php'>Masuk/Daftar</a></div>";
    			}else{
				echo "<div id='page' align='center'><a href='keluar.php'>Keluar</a></div>";
			}?>
</nav>
