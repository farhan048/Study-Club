<?php
require '../../koneksi.php';

$user=mysqli_query($koneksi,"SELECT * FROM user");
function tambah($data){
  global $koneksi;
  // ambil data dari form
  $nim=$data["nim"];
  $nama=$data['nama'];
  $kelas=$data['kelas'];
  $kategori=$data['kategori'];
  $no_hp=$data['no_hp'];
  $email=$data['email'];
  $password=$data['password'];
  // query insert data ke database
  $input = "INSERT INTO user VALUES ('$nim','$nama','$kelas','$kategori','$no_hp','$email','$password')";
  mysqli_query($koneksi,$input);
  return mysqli_affected_rows($koneksi);
  
}
if (isset($_POST["submit"])) {  
  // cek data berhasil atau tidak menggunakan effected rows
  if ( tambah($_POST) > 0) {
      echo " 
      <script>
          alert('Data Berhasil Di Tambahkan')
          document.location.href='user.php';
      </script>
      ";
  }
  else {
      echo " 
      <script>
          alert('Data Gagal Di Tambahkan')
        
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

  <title>Halaman-User</title>

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

<!-- modal tambah -->
  <div class="modal" tabindex="-1" role="dialog" id="tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
											<input type="text" class="form-control form-control-user" name="email"
												placeholder="Masukan Email...">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="kelas"
                      placeholder="Masukan Kelas...">
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="no_hp"
												placeholder="Masukan Nomor HP...">
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
											<input type="password" class="form-control form-control-user" name="password"
												placeholder="Masukan Password...">
										</div>
      </div>
      <div class="modal-footer"> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <Button class="btn btn-primary btn-user" type="submit" name="submit">Tambah</Button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- akhir modal tambah -->

 <div class="card shadow mb-4">
            <div class="card-header py-3">
                           <!-- Button trigger modal -->
            <button class="btn btn-primary btn-icon-split" type="button" data-toggle="modal" data-target="#tambah">
                    <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah User</span>
                  </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nim</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1;?>
     <?php foreach($user as $row) : ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $row["nim"]?></td>
      <td><?= $row["nama"]?></td>
      <td>
      
      <a href="detail.php?nim=<?= $row["nim"] ?>" class="btn btn-success btn-sm" role="button" aria-pressed="true" name="detail"><i class="fas fa-eye"></i></a>
      <a href="ubah.php?nim=<?= $row["nim"] ?>" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-user-edit"></i></a>
      <a href="hapus.php?nim=<?= $row["nim"] ?>"onclick="return confirm('Apakah Yakin Akan Di Hapus')"class="btn btn-danger btn-sm" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a>
    </td>
    </tr>
    <?php $i++; ?> 
<?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
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
