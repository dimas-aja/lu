
<?php 
include 'koneksi.php';

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="anyar/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="anyar/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="anyar/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="anyar/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="anyar/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="anyar/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="anyar/css/util.css">
  <link rel="stylesheet" type="text/css" href="anyar/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100 ">
      <div class="wrap-login95"  >
        <div class="login100-pic js-tilt" data-tilt>
          <img src="images/img-01.png" alt="IMG">
        </div>
<br><br>
       <form action=" " method="post" role="form">
              <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input100" name="nama" type="text" placeholder="Nama Siswa" >
                <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
              </div>
              <div class="wrap-input100 validate-input">
                <input class="input100"  name="nis" type="password" placeholder="NIS">
                <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
              </div>
              <div class="form-group">
                <button class="login100-form-btn" type="submit"  >
              Login
            </button>
                
              </div>
          </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="anyar/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="anyar/vendor/bootstrap/js/popper.js"></script>
  <script src="anyar/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="anyar/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="anyar/vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  //variabel untuk menyimpan kiriman dari form
  $nama = $_POST['nama'];
  $nis = $_POST['nis'];
  
  if($nama=='' || $nis==''){
    echo "Form belum lengkap!!";
  }else{
    include "koneksi.php";
    $sqlLogin = mysqli_query($konek, "SELECT * FROM siswa 
            WHERE nama='$nama' AND nis='$nis'");
    $jml = mysqli_num_rows($sqlLogin);
    $d=mysqli_fetch_array($sqlLogin);
    if($jml > 0){
      session_start();
      $_SESSION['login']  = true;
      $_SESSION['nisn']   = $d['nisn'];
      $_SESSION['nama']=$d['nama'];
      
      header('location:halaman_siswa.php');
    }
  }
}
?>