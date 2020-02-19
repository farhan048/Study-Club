<?php
include '../../koneksi.php';
$x = $_GET["nim"];
$q="SELECT * FROM user WHERE nim='$x'";
$query= mysqli_query($koneksi,$q);
foreach($query as $data) :
  $nim=$data["nim"];
  $nama=$data['nama'];
  $kelas=$data['kelas'];
  $kategori=$data['kategori'];
  $no_hp=$data['no_hp'];
  $email=$data['email'];
  $password=$data['password'];
endforeach;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<!-- Custom styles for this page -->
<link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php
      include 'menu.php';
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php
      include 'header.php';
    ?>
    

        <!-- Begin Page Content -->
          <div class="container-fluid">
           <div class="container">
           <div class="row-md-3">
           <form class="user" action="" method="post">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="nim" value="<?=$nim?>" readonly>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="nama" value="<?=$nama?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="email" value="<?=$kelas?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="no_hp" value="<?=$no_hp?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="no_hp" value="<?=$kategori?>">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="password" value="<?=$password?>">
										</div>
                            <Button class="btn btn-primary " type="submit" name="submit">
                                Simpan
                            </Button>
                        </form>
           </div>
           </div>
      <!-- End of Main Content -->
    
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Study Club Himatif 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>
</html>
<?php
if (isset($_POST["submit"])) {
  $nm=$data['nama'];
  $kls=$data['kelas'];
  $nohp=$data['no_hp'];
  $eml=$data['email'];
  $pwd=$data['password'];
$query2="UPDATE admin SET nama='$nm', kelas='$kls', no_hp='$nohp', email='$eml',  password='$pwd' WHERE nim='$x'";
mysqli_query($koneksi,$query2);
echo " 
      <script>
          alert('Data Berhasil Di Ubah')
          document.location.href='user.php';
      </script>
      ";
}
?>
