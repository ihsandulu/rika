<?php
require("scripts/connect.php");
$cek="Select * from testimonial order by id_testimonial desc LIMIT 0,6";
$hasil=mysql_query($cek);
while($data=mysql_fetch_array($hasil)){
echo "<br>
<b>$data[username]</b>, $data[tanggal]<br>
$data[testimonial]<br>";
} 
?>