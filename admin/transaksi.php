
      <?php 
      include 'koneks.php';
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
       <?php

        include 'koneksi.php';

        

     $sql = mysql_query("SELECT * FROM pembayaran ORDER BY nisn DESC");

    echo '<h2>Transaksi PMB</h2><hr>';

      echo '<div class="row">';

    echo '<div class="col-md-9"><table class="table table-bordered" id="tampil">';

     echo '<input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Nama siswa...">';

    echo '<tr class="info"><th>#</th><th width="100">Tanggal</th><th>Nama Siswa</th><th>Jumlah Bayar</th>';

    echo '<th width="200"><a href="./admin.php?hlm=bayar_pmb&sub=pmb&aksi=baru" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';

    

if (isset($_POST['search'])) {

  require_once 'koneksi.php';

  $no = 1;

  $search = $_POST['search'];

  $sql=mysql_query("SELECT pembayaran.nis, pembayaran.tgl_bayar, sum(pembayaran.jumlah) as total from pembayaran WHERE pembayaran.nis group by pembayaran.nis ASC");

      $noo = 1;

      $bb=0;

      while(list($nis,$tgl_bayar,$total) = mysql_fetch_array($sql)){

        echo '<tr><td>'.$noo.'</td>';

        echo '<td>'.$nis.'</td>';

        $qprodi = mysql_query("SELECT nama FROM siswa WHERE siswa.nis = '$nis' nama LIKE '%".$search."%' ");

        list($nama) = mysql_fetch_array($qprodi);

        echo '<td>'.$nama.'</td>';

        echo '<td>'.date('d M Y', strtotime($tgl_bayar)).'</td>';

        echo '<td align=right>'.number_format($total).'</td>';

        echo '</tr>';

        $noo++;

      }

      

      $sqll = mysql_query("SELECT SUM(jumlah) AS BAYAR FROM pembayaran");

      while($db=mysql_fetch_array($sqll)){

      $bb = $db['BAYAR'];

      $cc=number_format($bb);

          

    }



      echo "<tr><td></td><td><b>JUMLAH</b></td><td></td><td></td><td align=right><b>$cc</b></td></tr>";

    } else {

      echo '<tr><td colspan="5"><em>Belum ada data</em></td></tr>';

    }






    

    echo '</table></div></div>';

  ?>

          </div>
          </div></div></div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>