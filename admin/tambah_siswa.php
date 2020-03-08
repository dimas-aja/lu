        
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

        $nisn=input($_POST["nisn"]);
        $nis=input($_POST["nis"]);
        $nama=input($_POST["nama"]);
        $id_kelas=input($_POST["id_kelas"]);
        $alamat=input($_POST["alamat"]);
        $no_telp=input($_POST["no_telp"]);
        $id_spp=input($_POST["id_spp"]);

        //Query input menginput data kedalam tabel 
        $sql="insert into siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) values
        ('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')";
        

        $hasil=mysqli_query($koneksi,$sql);
        var_dump($hasil);

        if ($hasil) {
            header("Location:siswa.php");
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
                </span> Form Siswa </h3>
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
            <input type="text" name="nisn" class="form-control" placeholder="Masukan Nisn" required />

        </div>
        <div class="form-group">
            <label>Nis:</label>
            <input type="text" name="nis" class="form-control" placeholder="Masukan Nis" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

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
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required />

        </div>
        <div class="form-group">
            <label>No Telfon:</label>
            <input type="text" name="no_telp" class="form-control" placeholder="Masukan No Telfon" required />

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


           