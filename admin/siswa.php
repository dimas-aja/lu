
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
                </span> DATA SISWA </h3>
              <nav aria-label="breadcrumb">
                <a href="tambah_siswa.php"><button type="button" class="btn btn-info btn-lg btn-sm" >  Tambah Data</button></a>
              </nav>
                 </div>
            <?php

                            include "koneksi.php";


                            if (isset($_GET['nisn'])) {
                                $nisn=htmlspecialchars($_GET["nisn"]);

                                $sql="delete from siswa where nisn='$nisn' ";
                                $hasil=mysqli_query($koneksi,$sql);

                                    if ($hasil) {
                                        header("Location:siswa.php");

                                    }
                                    else {
                                        echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

                                    }
                                }
                        ?>
             <div class="col-lg-15 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <table class="table">
                      
                        <thead>
                             <tr>
                             <th width="2%">No</th>
                             <th width="10%">Nisn</th>
                             <th width="10%">Nis</th>
                             <th>Nama</th>
                             <th width="5%">Kelas</th>
                             <th width="10%">Alamat</th>
                             <th width="10%">No Telfon</th>
                             <th width="10%">Spp</th>
                             <th width="15%">Aksi</th>

                                            </tr>
                                            </thead>
                                            <?php
                                            include "koneksi.php";
                                            $sql="select * from siswa order by nisn desc";

                                            $hasil=mysqli_query($koneksi,$sql);
                                            $no=0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                $no++;

                                                ?>
                                                <tbody>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $data["nisn"]; ?></td>
                                                    <td><?php echo $data["nis"];   ?></td>
                                                    <td><?php echo $data["nama"];   ?></td>
                                                    <td><?php echo $data["id_kelas"];   ?></td>
                                                    <td><?php echo $data["alamat"];   ?></td>
                                                    <td><?php echo $data["no_telp"];   ?></td>
                                                    <td><?php echo $data["id_spp"];   ?></td>
                                                    <td>
                                                        <a href="update_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                                                        <a href="delete_siswa.php?nisn=<?php echo htmlspecialchars($data["nisn"]); ?>" class="btn btn-danger btn-sm"  role="button"> Delete</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                            ?>
                                        </table> 
                                    </div>
                                </div>
          </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>