<?php
require '../../koneksi.php';
$tampil=mysqli_query($koneksi,"SELECT materi.id_materi, materi.nama_materi, materi.file_materi, kategori.nama_kategori
 FROM materi INNER JOIN kategori ON materi.id_kategori=kategori.id_kategori");

if (isset($_POST["submit"])) {  
        // $allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
        // $materi       = $_FILES['materi']['name']; 
				// $file_ext     = pathinfo($materi, PATHINFO_EXTENSION);
				// $file_size		= $_FILES['materi']['size'];
				// $file          = $_FILES['materi']['tmp_name']; 
        // $nama_materi  = $_POST['nama_materi'];
        // $id_kategori  = $_POST['id_kategori'];
				// if(in_array($file_ext, $allowed_ext) === true){
				// 	if($file_size < 102400){
				// 		move_uploaded_file($file,"../../file/materi/$file_ext");
				// 		$in = mysqli_query($koneksi,"INSERT INTO materi VALUES('','$nama_materi','$file_ext','$id_kategori')");
				// 		if($in){
				// 			echo 'SUCCESS: File berhasil di Upload!</div>';
				// 		}else{
				// 			echo 'ERROR: Gagal upload file!</div>';
				// 		}
				// 	}else{
				// 		echo 'ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
				// 	}
				// }else{
				// 	echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
				// }
  $nama_materi=$_POST['nama_materi'];
  $id_kategori=$_POST['id_kategori'];
  $materi= $_FILES['materi']['name']; 
  $file  = $_FILES['materi']['tmp_name']; 
  move_uploaded_file($file,"../../file/materi/$materi");
  $input="INSERT INTO materi values('','$nama_materi','$materi','$id_kategori')";
  mysqli_query($koneksi,$input);
  $tambah = mysqli_affected_rows($koneksi);
  //cek data berhasil atau tidak menggunakan effected rows
//   if ( tambah($_POST) > 0) {
//     echo " 
//     <script>
//         alert('Data Berhasil Di Tambahkan')
//         document.location.href='jadwal.php';
//     </script>
//     ";
// }
// else {
//     echo " 
//     <script>
//         alert('Data Gagal Di Tambahkan')
      
//     </script>
//     ";
// }
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

<!-- modal tambah -->
  <div class="modal" tabindex="-1" role="dialog" id="tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
      <input type="text" class="form-control" name="nama_materi" placeholder="Masukan Judul materi...">
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
                    <div class="form-group">
    <input type="file" class="form-control-file" name="materi">
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
            <button class="btn btn-danger btn-icon-split" type="button" data-toggle="modal" data-target="#tambah">
                    <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Materi</span>
                  </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Nama Materi</th>
                      <th>File Materi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1;?>
     <?php foreach($tampil as $row) : ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $row["nama_kategori"]?></td>
      <td><?= $row["nama_materi"]?></td>
      <td><?= $row["file_materi"]?></td>
      <td>
      <a href="download.php?nama=<?= $row["file_materi"] ?>"class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
      <!-- <i href="ubah.php?id=<?= $row["id_materi"] ?>" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-user-edit"></i></a> -->
      <a href="hapus.php?id=<?= $row["id_materi"] ?>"onclick="return confirm('Apakah Yakin Akan Di Hapus')"class="btn btn-danger btn-sm" role="button" aria-pressed="true"><i class="fas fa-trash-alt"></i></a>
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
