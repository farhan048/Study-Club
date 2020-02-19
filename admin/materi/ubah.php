<?php
include '../../koneksi.php';
$x = $_GET["id"];
$q="SELECT materi.id_materi, materi.nama_materi, materi.file_materi, kategori.nama_kategori
FROM materi INNER JOIN kategori ON materi.id_kategori=kategori.id_kategori WHERE id_materi='$x'";
$query= mysqli_query($koneksi,$q);
foreach($query as $data) :
  $nama=$data['nama_materi'];
  $kategori=$data['nama_kategori'];
  $file=$data['file_materi'];

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
											<input type="text" class="form-control form-control-user" name="nama" value="<?=$nama?>">
										</div>
										<div class="form-group">
                      <label for="nama_kategori"> kategori saat ini</label>
											<input type="text" class="form-control form-control-user" id="nama_kategori" name="nama_kategori" value="<?=$kategori?>" readonly>
										</div>
                    <div class="form-group">
											<select class="form-control" name="id_kategori">
												<option value="id_kategori">Pilih Kategori</option>
                        <?php 
                        $kategori=mysqli_query($koneksi,"SELECT * FROM kategori");
                        while ($data= mysqli_fetch_array($kategori)) {
                            echo" <option value='$data[id_kategori]'>$data[nama_kategori]</option>";
                        }
                        ?>
											</select>
										</div>
                    <input type="file" class="form-control-file" name="materi">
                    <br>
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
  $nama=$_POST['nama'];
  $id_kategori=$_POST['id_kategori'];
  $materi = $_FILES['materi']['name']; 
  move_uploaded_file($file,"../../file/materi/$materi");
$query2="UPDATE materi SET nama_materi='$nama',file_materi='$materi',id_kategori='$id_kategori' WHERE id_materi='$x'";
mysqli_query($koneksi,$query2);

}
?>
