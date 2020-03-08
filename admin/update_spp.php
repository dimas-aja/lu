        
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

    if (isset($_GET['id_spp'])) {
        $id_spp=input($_GET["id_spp"]);

        $sql="select * from spp where id_spp=$id_spp";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_spp=htmlspecialchars($_POST["id_spp"]);
        $tahun=input($_POST["tahun"]);
        $nominal=input($_POST["nominal"]);

        $sql="update spp set
      id_spp='$id_spp',
      tahun='$tahun',
      nominal='$nominal'
      where id_spp=$id_spp";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil>0) {
            header("Location:spp.php");
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
                </span> Edit SPP </h3>
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
                            <label class="col-sm-3 col-form-label">ID Spp</label>
                            <div class="col-sm-9">
                             <input type="text" name="id_spp" class="form-control" placeholder="ID Spp" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                              <input type="number" name="tahun" class="form-control" value="<?php echo $data['tahun']; ?>" placeholder="Tahun" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
                              <input type="number" name="nominal" class="form-control" value="<?php echo $data['nominal']; ?>" placeholder="nominal" required/>
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


           