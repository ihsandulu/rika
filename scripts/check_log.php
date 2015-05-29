<?php
session_start();
if(isset($_SESSION['username'])){
	if(isset($_SESSION['password'])){
		if(isset($_SESSION['namalengkap'])){
			$status = 1;
		}
	}
}

?>