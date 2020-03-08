
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
                </span> DATA KELAS </h3>
              <nav aria-label="breadcrumb">
                 <a href="tambah_kelas.php"><button type="button" class="btn btn-info btn-lg btn-sm" > Tamabah Data</button></a>
              </nav>
            </div>
             <?php

                                include "koneksi.php";


                                if (isset($_GET['id_kelas'])) {
                                    $id_kelas=htmlspecialchars($_GET["id_kelas"]);

                                    $sql="delete from anggota where id_kelas='$id_kelas' ";
                                    $hasil=mysqli_query($koneksi,$sql);

                                        if ($hasil) {
                                            header("Location:kelas.php");

                                        }
                                        else {
                                            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

                                        }
                                    }
                            ?>
             <div class="col-lg-15 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">KELAS</h4>
                    <table class="table">
                      <thead>
                       <tr >
                          <th width="3">No</th>
                          <th>Nama Kels</th>
                          <th>Kompetensi Keahlian</th>
                          <th width="18%" >Aksi</th>

                          </tr>
                          </thead>
                                            <?php
                                            include "koneksi.php";
                                            $sql="select * from kelas order by id_kelas desc";

                                            $hasil=mysqli_query($koneksi,$sql);
                                            $no=0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                $no++;

                                                ?>
                                                <tbody>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $data["nama_kelas"];   ?></td>
                                                    <td><?php echo $data["keahlian"];   ?></td>
                                                    <td>
                                                        <a href="update_kelas.php?id_kelas=<?php echo htmlspecialchars($data['id_kelas']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                                                        <a href="delete_kelas.php?id_kelas=<?php echo htmlspecialchars($data["id_kelas"]); ?>" class="btn btn-danger btn-sm" role="button">Delete</a>
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