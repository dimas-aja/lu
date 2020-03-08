        
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

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_kelas=input($_POST["id_kelas"]);
        $nama_kelas=input($_POST["nama_kelas"]);
        $keahlian=input($_POST["keahlian"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into kelas (id_kelas,nama_kelas,keahlian) values
    ('$id_kelas','$nama_kelas','$keahlian')";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location:kelas.php");
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
                </span> Form Kelas </h3>
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
                    <form class="form-sample" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID kelas</label>
                            <div class="col-sm-9">
                               <input type="text" name="id_kelas" class="form-control" placeholder="Masukan ID Kelas" required  />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
                             <input type="text" name="nama_kelas" class="form-control" placeholder="Masukan Nama Kelas" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                            <div class="col-sm-9">
                              <input type="text" name="keahlian" class="form-control" placeholder="Masukan Kompetensi Keahlian" required />
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


           