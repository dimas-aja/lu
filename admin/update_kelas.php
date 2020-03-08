        
      <?php 
include '_navbar.php';
 ?>

    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id_kelas'])) {
        $id_kelas=input($_GET["id_kelas"]);

        $sql="select * from kelas where id_kelas=$id_kelas";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_kelas=htmlspecialchars($_POST["id_kelas"]);
        $nama_kelas=input($_POST["nama_kelas"]);
        $keahlian=input($_POST["keahlian"]);

        $sql="update kelas set
      id_kelas='$id_kelas',
      nama_kelas='$nama_kelas',
      keahlian='$keahlian'
      where id_kelas=$id_kelas";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location:kelas.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>

      <!-- partial -->

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit Kelas </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
 

              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Kelas</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kelas</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="keahlian" value="<?php echo $data['keahlian']; ?>" />
                            </div>
                          </div>
                        </div>                
                      </div>
                       <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>


           