
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

if( empty( $_SESSION['nisn'] ) ){

  $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';

  header('Location: ./');

  die();

} else {

  /* tahapan pembayaran SPP

    1. masukkan nis

    2. tampilkan histori pembayaran (jika ada) dan form pembayaran

    3. proses pembayaran, kembali ke nomor 2

  */

  echo '<h2>Pembayaran SPP</h2>
  
  <hr>';
  
  echo '';

  

  if(isset($_REQUEST['submit'])){

    //proses pembayaran secara bertahap

    $submit = $_REQUEST['submit'];

    $nis = $_REQUEST['nis'];



    

    //proses simpan pembayaran

    if($submit=='bayar'){

      $kls = $_REQUEST['kls'];

      $bln = $_REQUEST['bln'];

      $tgl = $_REQUEST['tgl'];

      $jml = $_REQUEST['jml'];

      

      $qbayar = mysql_query("INSERT INTO pembayaran VALUES('$kls','$nis','$bln','$tgl','$jml')");

      

      if($qbayar > 0){

        header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);

        die();

      } else {

        $qsiswa = mysql_query("SELECT * FROM siswa WHERE nis='$nis'");

    list($no,$nis,$nama,$idprodi) = mysql_fetch_array($qsiswa);

        echo "<b>$nama</b> Sudah Membayar Pada Bulan <b>$bln</b>";

      }

    }

    

    //proses hapus pembayaran, hanya ADMIN

    if($submit=='hapus'){

      $kls = $_REQUEST['kls'];

      $bln = $_REQUEST['bln'];

      $tgl = $_REQUEST['tgl'];

      $jml = $_REQUEST['jml'];

      

      $qbayar = mysql_query("DELETE FROM pembayaran WHERE kelas='$kls' AND nis='$nis' AND bulan='$bln'");

      

      if($qbayar > 0){

        header('Location: ./admin.php?hlm=bayar&submit=v&nis='.$nis);

        die();

      } else {

        echo 'ada ERROR dg query';

      }

    }

    

    //tampilkan data siswa

    $qsiswa = mysql_query("SELECT * FROM siswa WHERE nis='$nis'");

    list($no,$nis,$nama,$idprodi) = mysql_fetch_array($qsiswa);

    

      echo '<div class="row">';

    echo '<div class="col-sm-9"><table class="table table-bordered">';

    echo '<tr><td colspan="2">Nomor Induk</td><td colspan="3">'.$nis.'</td>';

      echo '<td><a href="./cetak.php?nis='.$nis.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak semua</a></td></tr>';

    echo '<tr><td colspan="2">Nama Siswa</td><td colspan="4">'.$nama.'</td></tr>';

      

    echo '<tr><td colspan="2">Pembayaran</td><td colspan="4">';

?>

<form class="form-inline" role="form" method="post" action="./admin.php?hlm=bayar">

  <input type="hidden" name="nis" value="<?php echo $nis; ?>">

  <input type="hidden" name="tgl" value="<?php echo date("Y-m-d"); ?>">

  <div class="form-group">

      <label class="sr-only" for="kls">Kelas</label>

    <select name="kls" class="form-control" id="kls">

    <?php

    $qkelas = mysql_query("SELECT kelas FROM siswa WHERE nis='$nis'");

    while(list($kelas)=mysql_fetch_array($qkelas)){

      echo '<option value="'.$kelas.'">'.$kelas.'</option>';

    }

    ?>

    </select>

  </div>

  <div class="form-group">

    <label class="sr-only" for="bln">Bulan</label>

  <select name="bln" id="bln" class="form-control">

  <?php

    for($i=1;$i<=12;$i++){

      $b = date('F',mktime(0,0,0,$i,10));

      echo '<option value="'.$b.'">'.$b.'</option>';

    }

  ?>

  </select>

  </div>

  <div class="form-group">

  <label class="sr-only" for="jml">Jumlah</label>

  <div class="input-group">

    <div class="input-group-addon">Rp.</div>

    <input type="number" class="form-control" id="jml" name="jml" placeholder="Jumlah">

  </div>

  </div>

  <button type="submit" class="btn btn-default" name="submit" value="bayar">Bayar</button>

</form>

<?php

    echo '</td></tr>';

    echo '<tr class="info"><th width="50">#</th><th width="100">Kelas</th><th>Bulan</th><th>Tanggal Bayar</th><th>Jumlah</th>';

    echo '<th>&nbsp;</th>';

    echo '</tr>';

    

    //tampilkan histori pembayaran, jika ada
        
    $qbayar = mysql_query("SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY tgl_bayar ASC");
        
        
    if(mysql_num_rows($qbayar) > 0){

      $no = 1;

      while(list($kelas,$bulan,$tgl,$jumlah) = mysql_fetch_array($qbayar)){

        echo '<tr><td>'.$no.'</td>';

        echo '<td>'.$kelas.'</td>';
        
        echo '<td>'.$bulan.'</td>';

        echo '<td>'.date('d M Y', strtotime($tgl)).'</td>';

        echo '<td align=right>'.number_format($jumlah).'</td><td>';

        

        if( $_SESSION['admin'] == 1 ){

          /*echo '<a href="./admin.php?hlm=bayar&submit=hapus&kls='.$kelas.'&nis='.$nis.'&bln='.$bulan.'" class="btn btn-danger btn-xs">Hapus</a>';*/

        }

            echo ' <a href="./cetak.php?submit=nota&kls='.$kelas.'&nis='.$nis.'&bln='.$bulan.'" target="_blank" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>';

        echo '</td></tr>';

        

        $no++;

      }

    } else {

      echo '<tr><td colspan="6"><em>Belum ada data!</em></td></tr>';

    }

    echo '</table></div></div>';

    

  } else {

?>



</div>
      

<?php

  }

}

?>

            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>