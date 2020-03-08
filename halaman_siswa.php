
      <?php 
include '_navbar.php';
 ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="halaman_siswa.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

           
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
 
<center><h2 class="display-3">SELAMAT DATANG </h2></center>
                            <center><p class="lead">Anda Login Sebagai SISWA yang mempunyai semua Hak Akses</p>
                            <p>Tim Support</p></center>
                              <?php 
  include 'koneksi.php';
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['nama']==""){
    header("location:index.php?pesan=gagal");
  }
  $nm=$_SESSION['nisn'];
  $query=mysqli_query($konek,"SELECT * FROM pembayaran where nisn='$nm'");
 
  ?>

              <table border="1">
                  <tr>
                    <td>Tgl_Bayar</td>
                    <td>ID_Pembayaran</td>
                    <td>Jumlah Bayar</td>
                  </tr>
                  
                    <?php while ($data=mysqli_fetch_array($query)) { ?>
                    <tr>
                    <td><?php echo $data['tgl_bayar']; ?></td>
                    <td><?php echo "DIM".$data['id_pembayaran']; ?></td>
                    <td><?php echo $data['jumlah_bayar']; ?></td>
                    </tr>
                    <?php } ?>
                  
              </table>
          </div>
          <div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>