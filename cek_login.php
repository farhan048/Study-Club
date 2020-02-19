<?php 
  
error_reporting(0);
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require 'koneksi.php';

// // menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];



// menyeleksi data user dengan username dan password yang sesuai
// $login = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_user='$username' and password='$password'");
$login = mysqli_query($koneksi,"select * from admin where 
username='$username' and password='$password'");
$data = mysqli_fetch_assoc($login);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
var_dump($cek);
// cek apakah username dan password di temukan pada database
if($cek > 0){
	// isi dari variabel session
	$_SESSION['username'] = $r['username'];
	$_SESSION['password'] = $r['password'];
	$_SESSION['status'] = "login";
    header("location:admin/index.php");
}else {
    print "<script>
				alert(\"Periksa Pengisian Form\");
				location.href = \"login.php\";
			</script>";	
    }
?>