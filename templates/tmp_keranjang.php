<?php if (isset($_SESSION['username'])){
      $pilih=mysqli_query($link,"SELECT * FROM keranjang where username='$user'");
      $hasil=mysqli_num_rows($pilih);
		echo '<a href="keranjang_belanja.php"><img src="../images/keranjang_belanja.png" border="0" title="Keranjang"</a><br><br>';
  }
  ?>
  
