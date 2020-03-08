
      <?php 
include '_navbar.php';
 ?>

 
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> DATA PETUGAS </h3>
              <nav aria-label="breadcrumb">
               <a href="tambah_petugas.php"><button type="button" class="btn btn-info btn-lg btn-sm" >  Tambah Data</button></a>
              </nav>
              </nav>
            </div>
  <?php

                            include "koneksi.php";


                            if (isset($_GET['id_petugas'])) {
                                $id_petugas=htmlspecialchars($_GET["id_petugas"]);

                                $sql="delete from petugas where id_petugas='$id_petugas' ";
                                $hasil=mysqli_query($koneksi,$sql);

                                    if ($hasil) {
                                        header("Location:petugas.php");

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
                         <thead>
                                <tr>
                                    <th width="3">No</th>
                                    <th width="30%">Username</th>
                                    <th width="30%">Password</th>
                              <th>Nama Petugas</th>
                              <th>Level</th>
                                    <th >Aksi</th>

                                </tr>
                                </thead>
                                <?php
                                include "koneksi.php";
                                $sql="select * from user order by id_petugas desc";

                                $hasil=mysqli_query($koneksi,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;

                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $data["username"];   ?></td>
                                        <td><?php echo $data["password"];   ?></td>
                                <td><?php echo $data["nama_petugas"];   ?></td>
                                <td><?php echo $data["level"];   ?></td>
                                        <td>
                                            <a href="update_petugas.php?id_petugas=<?php echo htmlspecialchars($data['id_petugas']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                                            <a href="delete_petugas.php?id_petugas=<?php echo htmlspecialchars($data["id_petugas"]); ?>" class="btn btn-danger btn-sm" role="button">Delete</a>
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