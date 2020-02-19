<?php

require '../koneksi.php';
session_start();
$id = $_SESSION['username'];
$user = mysqli_query($koneksi,"SELECT * FROM admin where username='$id'");
foreach($user as $data) :
  $nama=$data['nama'];
endforeach;

$admin =mysqli_query($koneksi,"SELECT * FROM admin");
$total = mysqli_num_rows($admin);

$user =mysqli_query($koneksi,"SELECT * FROM user");
$total_user = mysqli_num_rows($user);

$mm= mysqli_query($koneksi,"SELECT * FROM user where kategori='Multimedia'");
$total_mm = mysqli_num_rows($mm);

$wp= mysqli_query($koneksi,"SELECT * FROM user where kategori='Web Programming'");
$total_wp = mysqli_num_rows($wp);

$mp= mysqli_query($koneksi,"SELECT * FROM user where kategori='Mobile Programming'");
$total_mp = mysqli_num_rows($mp);

$ns= mysqli_query($koneksi,"SELECT * FROM user where kategori='Network Security'");
$total_ns = mysqli_num_rows($ns);

$jadwal =mysqli_query($koneksi,"SELECT * FROM jadwal");
$total_jadwal = mysqli_num_rows($jadwal);

$tb_jadwal =mysqli_query($koneksi,"SELECT * FROM jadwal ORDER BY tanggal DESC LIMIT 1");

$materi =mysqli_query($koneksi,"SELECT * FROM materi");
$total_materi = mysqli_num_rows($materi);

$project =mysqli_query($koneksi,"SELECT * FROM project");
$total_project = mysqli_num_rows($project);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
          <h3>Selamat Datang,<?= $nama;?></h3>
          <div class="row">
            <!-- Card Admin -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total?></div>
                    </div>
                    <div class="col-auto">
                      <a class="btn btn-primary" href="admin.php" role="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card User -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_user?></div>
                    </div>
                    <div class="col-auto">
                      <a class="btn btn-success" href="user/user.php" role="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Card jadwal -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jadwal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_jadwal?></div>
                    </div>
                    <div class="col-auto">
                      <a class="btn btn-danger" href="jadwal/jadwal.php" role="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Card materi -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Materi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_materi?></div>
                    </div>
                    <div class="col-auto">
                      <a class="btn btn-info" href="materi/materi.php" role="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card materi -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Project</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_project?></div>
                    </div>
                    <div class="col-auto">
                      <a class="btn btn-warning" href="project/project.php" role="button">Detail</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary text-center">User Bedasarkan Kategori</h6>
                </div>
                <div class="card-body">
                  <div id="piechart_3d" style="width: 1000px; height: 500px;"></div>            
                  <hr>
                  
                </div>
              </div>
            
            <br>
            <br>
            
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['kategori', 'total'],
          ['Web Programing', <?=$total_wp;?>],
          ['Mobile Programing', <?=$total_mp;?>],
          ['Multimedia', <?=$total_mm;?>],
          ['Network Security', <?=$total_ns;?>],
        ]);

        var options = {
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

</body>

</html>