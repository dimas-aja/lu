
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
                </span> DATA SPP </h3>
              <nav aria-label="breadcrumb">
               <a href="tambah_spp.php"><button type="button" class="btn btn-info btn-lg btn-sm" >  Tambah Data</button></a>
              </nav>
            </div>
              <?php

                            include "koneksi.php";


                            if (isset($_GET['id_spp'])) {
                                $id_spp=htmlspecialchars($_GET["id_spp"]);

                                $sql="delete from anggota where id_spp='$id_spp' ";
                                $hasil=mysqli_query($koneksi,$sql);

                                    if ($hasil) {
                                        header("Location:spp.php");

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
                                    <th width="3%">No</th>
                                    <th width="29%">Tahun</th>
                                    <th width="50%">Nominal</th>
                                    <th >Aksi</th>

                                </tr>
                                </thead>
                                <?php
                                include "koneksi.php";
                                $sql="select * from spp order by id_spp desc";

                                $hasil=mysqli_query($koneksi,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;

                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $data["tahun"];   ?></td>
                                        <td><?php echo $data["nominal"];   ?></td>
                                        <td>
                                            <a href="update_spp.php?id_spp=<?php echo htmlspecialchars($data['id_spp']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                                            <a href="delete_spp.php?id_spp=<?php echo htmlspecialchars($data["id_spp"]); ?>" class="btn btn-danger btn-sm" role="button">Delete</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <?php
                                }
                                ?>
                            </table>
                            </div>

                             
                  </div><!-- /.row -->
                 </div><!--/.main-->
     </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>