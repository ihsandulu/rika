<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Halaman Administrator'); window.location = '../admin.php'</script>";
?>
<script>$(document).ready(function(){$('#keluar').attr('class','active')});</script>