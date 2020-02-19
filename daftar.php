<?php
require 'koneksi.php';
function daftar($data){
  global $koneksi;
  // ambil data dari form
  $nim=$data["nim"];
  $nama=$data['nama'];
  $kelas=$data['kelas'];
  $kategori=$data['kategori'];
  $no_hp=$data['no_hp'];
  $email=$data['email'];
  $password=$data["password"];
  // query insert data ke database
  $input = "INSERT INTO user VALUES ('$nim','$nama','$kelas','$kategori','$no_hp','$email','$password')";
  mysqli_query($koneksi,$input);
  return mysqli_affected_rows($koneksi);
  }
if (isset($_POST["submit"])) {  
  // cek data berhasil atau tidak menggunakan effected rows
  if ( daftar($_POST) > 0) {
      echo " 
      <script>
          alert('Berhasil Daftar')
          document.location.href='login.php';
      </script>
      ";
  }
  else {
      echo " 
      <script>
          alert('Gagal Daftar')
		  document.location.href='daftar.php';
      </script>
      ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>daftar akun</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(img/0.jpg);background-size: cover">

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
										<h1 class="h4 text-gray-900 mb-4">Halaman Daftar!</h1>
									</div>
									<form class="user" action="" method="post">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="nim"
												placeholder="Masukan Nim..."  autofocus>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="nama"
												placeholder="Masukan Nama...">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="kelas"
												placeholder="Masukan Kelas...">
										</div>
										<div class="form-group">
											<select class="form-control" id="kategori" name="kategori">
												<option value="">Pilih Kategori</option>
												<option value="Web Programming">Web Programming</option>
												<option value="Mobile Programming">Mobile Programming</option>
												<option value="Multimedia">Multimedia</option>
												<option value="Network Security">Network Security</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="no_hp"
												placeholder="Masukan Nomor HP...">
										</div>
										<div class="form-group">
											<input type="email" class="form-control form-control-user" name="email"
												placeholder="Masukan Email...">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password"
												placeholder="Masukan Password...">
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" 
												placeholder="Masukan Ulang Password...">
										</div>
										<Button class="btn btn-primary btn-user btn-block" type="submit" name="submit">
                                           Daftar
                                        </Button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="login.php">sudah Punya Akun!</a>
									</div>
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