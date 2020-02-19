<?php
require '../../koneksi.php';
$jadwal =mysqli_query($koneksi,"SELECT * FROM jadwal  ORDER BY tanggal DESC");
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
        <h5 class="modal-title">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="" method="POST">
          <label for="tanggal">Tanggal Kegiatan :</label>
            <div class="form-group">
                <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal"  autofocus>
              </div>
          <label for="nama">Nama Kegiatan :</label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama" name="nm_kegiatan" placeholder="Masukan Nama Kegiatan..." >
              </div>
          <label for="waktu_mulai">Waktu Mulai :</label>
            <div class="form-group">
                <input type="time" class="form-control form-control-user" id="waktu_mulai" name="waktu_mulai">
            </div>
          <label for="waktu_selesai">Waktu Selesai :</label>
            <div class="form-group">
                <input type="time" class="form-control form-control-user" id="waktu_selesai" name="waktu_selesai">
            </div>
          <label for="tempat">Tempat :</label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="tempat" name="tempat" placeholder="Masukan Tempat Kegiatan...">
            </div>
            <div class="form-group">
            <label for="keterangan">Keterangan :</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Nama Kegiatan</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Tempat</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1;?>
     <?php foreach($jadwal as $row) : ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $row["tanggal"]?></td>
      <td><?= $row["nm_kegiatan"]?></td>
      <td><?= $row["waktu_mulai"]?></td>
      <td><?= $row["waktu_selesai"]?></td>
      <td><?= $row["tempat"]?></td>
      <td><?= $row["keterangan"]?></td>
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
