<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>Amazing Slider</title>
    
    <!-- Insert to your webpage before the </head> -->
    <script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <script src="sliderengine/initslider-1.js"></script>
    <!-- End of head section HTML codes -->
    
</head>
<body>
<div style="margin:30px auto;max-width:700px;">
    
    <!-- Insert to your webpage where you want to display the slider -->
    <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 56px;">
        <ul class="amazingslider-slides" style="display:none;">
		<?php $q="SELECT * FROM `produk` ORDER BY RAND() LIMIT 0,4;";
		$f=mysqli_query($link,$q);
		while($g=mysqli_fetch_assoc($f)){?>		
            <li><img src="products/<?=$g['gambar'];?>" /></li>
			<?php }?>  
        </ul>
        
        <div class="amazingslider-engine" style="display:none;"><a href="http://amazingslider.com">JavaScript Slider</a></div>
    </div>
    <!-- End of body section HTML codes -->
    
</div>
</body>
</html>