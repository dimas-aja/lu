        
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

        $id_petugas=input($_POST["id_petugas"]);
        $username=input($_POST["username"]);
        $password=input($_POST["password"]);
    $nama_petugas=input($_POST["nama_petugas"]);
        $level=input($_POST["level"]);

        $sql="insert into user (id_petugas,nama_petugas,username,password,level) values
    ('$id_petugas','$nama_petugas','$username','$password','$level')";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location:petugas.php");
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
                </span> Form Petugas </h3>
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
                            <label class="col-sm-3 col-form-label">ID Petugas</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="id_petugas"  />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Petugas</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama_petugas" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="username" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">password</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="password" />
                            </div>
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="level" id="level">
                                <option value="admin" selected="selected"> Admin</option>
                                <option value="petugas" selected="selected"> Petugas</option>
                                <option value="siswa" selected="selected">siswa</option>
                              </select>
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


           