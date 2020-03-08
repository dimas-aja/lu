        
      <?php 
include '_navbar.php';
 ?>
 <?php

    include "koneksi.php";
    
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_spp=input($_POST["id_spp"]);
        $tahun=input($_POST["tahun"]);
        $nominal=input($_POST["nominal"]);

        $sql="insert into spp (id_spp,tahun,nominal) values
    ('$id_spp','$tahun','$nominal')";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location:spp.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

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
                </span> Form SPP </h3>
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
                             <input type="number" name="id_spp" class="form-control" placeholder="ID Spp" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tahun</label>
                            <div class="col-sm-9">
                              <input type="number" name="tahun" class="form-control"  placeholder="Tahun" required/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="input-group-prepend">
                          <span class="input-group-text mr-2">Rp.</span>
                        
                            <div class="col-sm-6">
                              <input type="number" name="nominal" class="form-control" placeholder="nominal" required/>
                            </div>
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


           