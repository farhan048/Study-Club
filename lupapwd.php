<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(img/2.jpg);background-size: cover">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halaman Reset password!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username"
                                                placeholder="Masukan Username..." autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="Password"  name="password"
                                                placeholder="Masukan Password Baru...">
                                        </div>
                                        <Button class="btn btn-primary btn-user btn-block" type="submit" name="submit">
                                            Reset
                                        </Button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 
if (isset($_POST["submit"])) {  
error_reporting(0);
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require 'koneksi.php';

// // menangkap data yang dikirim dari form login

function ubah($data){
    global $koneksi;
    // ambil data dari form
    $username = $data['username'];
    $password = $data['password'];

    // query update t data ke database
    $ubah = "UPDATE user SET password = '$password' WHERE nim ='$username'";
    mysqli_query($koneksi,$ubah);
    return mysqli_affected_rows($koneksi);
}

    //cek data berhasil atau tidak menggunakan effected rows
    if ( ubah($_POST) > 0) {
        echo " 
        <script>
            alert('Data Berhasil Di Ubah')
            document.location.href='login.php';
        </script>
        ";
    }else {
        echo " 
        <script>
            alert('Data Gagal Di Ubah')
            // document.location.href='lupapwd.php';
        </script>
        ";
    }
}
?>