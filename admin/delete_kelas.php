<?php 
include 'koneksi.php';
 
$id_kelas = $_GET['id_kelas'];
 
mysqli_query($koneksi,"delete from kelas where id_kelas='$id_kelas'");
header("location:kelas.php");
 
?>