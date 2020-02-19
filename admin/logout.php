<?php 
	error_reporting(0);
	session_start();
	include "../koneksi.php";
	if (empty($_SESSION[namauser])) 
	{
		exit("<script>window.alert ('Thank You');
			window.location='login.php';</script> ");
	}
	session_destroy();
	exit("<script>window.alert('Thank You');
		window.location='login.php';</script> "); 	

 ?>