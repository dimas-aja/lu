
      <?php 

include '_navbar.php';
 ?>

      <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Transaksi Pembayaran SPP </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
 


  <div class="col-13" >
   <div class="card">
    <div class="card-body">
       <form method="get" action="">
  NIS: <input type="text" name="nisn" />
  <input type="submit" name="cari" value="Cari Siswa" />
</form>

<?php
include 'koneks.php';

if(isset($_GET['nisn']) && $_GET['nisn']!=''){
  $sqlSiswa = mysqli_query($konek, "SELECT siswa.*,pembayaran .* FROM siswa,pembayaran");
  $ds=mysqli_fetch_array($sqlSiswa);
  $nisn = $ds['nisn'];
?>

<h3>Biodata Siswa</h3>
<table>
    <tr>
    <td>Tahun Ajaran</td>
    <td>:</td>
    <td><?php echo $ds['nisn']; ?></td>
  </tr>
  <tr>
    <td>NIS</td>
    <td>:</td>
    <td><?php echo $ds['nis']; ?></td>
  </tr>
  <tr>
    <td>Nama Siswa</td>
    <td>:</td>
    <td><?php echo $ds['nama']; ?></td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?php echo $ds['id_kelas']; ?></td>
  </tr>

</table>


<?php
}
?>

<p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas, kemudian proses pembayaran</p>
</div></div></div></div>
<?php include "_footer.php" ?>