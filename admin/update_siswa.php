        
      <?php 
include '_navbar.php';
 ?>
<?php
include 'koneksi.php';
     function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['nisn'])) {
        $nisn=input($_GET["nisn"]);

        $sql="select * from siswa where nisn=$nisn";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nisn=htmlspecialchars($_POST["nisn"]);
        $nis=input($_POST["nis"]);
        $nama=input($_POST["nama"]);
        $id_kelas=input($_POST["id_kelas"]);
        $alamat=input($_POST["alamat"]);
        $no_telp=input($_POST["no_telp"]);
        $id_spp=input($_POST["id_spp"]);

        $sql="update siswa set
            nisn='$nisn',
            nis='$nis',
            nama='$nama',
            id_kelas='$id_kelas',
            alamat='$alamat',
            no_telp='$no_telp',
            id_spp='$id_spp'
            where nisn=$nisn";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil>0) {
            header("Location:siswa.php");
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
                </span> Edit Siswa </h3>
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
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label> Nisn:</label>
            <input type="text" name="nisn" class="form-control" value="<?php echo $data['nisn']; ?>" placeholder="Masukan Nisn" required />

        </div>
        <div class="form-group">
            <label>Nis:</label>
            <input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>" placeholder="Masukan Nis" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required />

            </div>
        <div class="form-group">
            <label> ID Kelas:</label>
            <select class="form-control" name="id_kelas">
            <?php
                mysql_connect("localhost","root","");
                mysql_select_db("spp"); 
                $sql_kelas="SELECT * FROM kelas";
                $has=mysql_query($sql_kelas);
            
                while ($data=mysql_fetch_array($has)) {
                ?>
            
                <option value=<?php echo $data['nama_kelas']; ?>><?php echo $data['nama_kelas']; ?></option>
                <?php }?>
            </select>

            
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Alamat" required />

        </div>
        <div class="form-group">
            <label>No Telfon:</label>
            <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" placeholder="Masukan No Telfon" required />

            </div>
        <div class="form-group">
            <label>ID Spp:</label>
             <select class="form-control form-control-line" name="id_spp">
                <?php
                mysql_connect("localhost","root","");
                mysql_select_db("spp"); 
                $sql_spp="SELECT * FROM spp";
                $hasil=mysql_query($sql_spp);
            
                while ($dataa=mysql_fetch_array($hasil)) {
                ?>
                <option value=<?php echo $dataa['nominal']; ?> ><?php echo $dataa['nominal']; ?></option>
                <?php }?>
             </select>
             
              
            </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="siswa.php" class="btn btn-primary" role="button">Batal</a>
    </form>
                  </div>
                </div>
              </div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include '_footer.php' ?>

