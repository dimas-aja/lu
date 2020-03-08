<?php 
include 'koneksi.php';
 
$nisn = $_GET['nisn'];
 
mysqli_query($koneksi,"delete from siswa where nisn='$nisn'");
header("location:siswa.php");
 
?>