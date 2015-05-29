<?php

session_start();
if(isset($_SESSION['admin'])){
	header("location: admin/index.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Admin</title>
<meta charset="utf-8">
<style type="text/css">
body{
}
#main_wrapper{
	width: 400px;
	padding: 15px;
	margin: 100px auto;
	background: #E2A9F3;
	border-radius: 8px;
	-webkit-border-radius: 8px;
	-noz-border-radius: 8px;
	box-shadow: #080808 5px 5px 15px;
}
h2{
	color: #000;
	font-family:Tahoma, Geneva, sans-serif
	font-size: 24px;
}
label{
	color: #000;
	font-family: arial;
	font-weight: bold;
}
*text_input{
	width: 150px;
	padding: 5px;	
}
#button{
	padding: 5px 8px 5px;	
}

</style>
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../jquery/jquery.mobile-1.4.5.css">
<script src="../jquery/jquery-2.1.4.min.js"></script>
<script src="../jquery/jquery.mobile-1.4.5.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
							function validasi_input(form1){
							if (form1.username.value==""){
								alert("Nama Belum Diisi");
								form1.username.focus();
								return(false);
							}
							if (form1.password.value==""){
								alert("Kata Sandi Belum diisi");
								form1.password.focus();
								return(false);
							}
							return(true);
							}
							
							</script>
	<div id="main_wrapper">
    	<form name="form1" action="admin/login_admin_proses.php" onSubmit="return validasi_input(this)" method="post" enctype="multipart/form-data">
        <table width="100%" cellpadding="5" cellspacing="5" border="0">
        	<tr>
            	 <td align="center"><div align="left"><img src="images/admin.png" height="70"/>
          	   </div>
       	      <h2>Login Admin Butik Aleeya </h2></td>
            </tr>
            <tr>
            	 <td align="center">			  
			  	<div class="input-prepend">
  				<span class="add-on">User Name</span>
  				<input class="span2" id="username" type="text" placeholder="Username" name="username" >
				</div>				
				</td>
            </tr>
            <tr>
            	<td align="center"><div class="input-prepend">
  				<span class="add-on">Password</span>
  				<input class="span2" id="password" type="password" placeholder="Password" name="password" >
				</div>	
				</td>
            </tr>
            <tr>
           	  <td align="center" valign="middle"><br/><button type="submit" class="btn btn-primary btn-lg" name="submit" id="button" value="Login" style="width:100px; height:60px;" >Login</button></td>
            </tr>
          </table>
      </form>
   	</div> 
</body>
</html> 