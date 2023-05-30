<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jk = $_POST['jk'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into siswa values('','$nama','$kelas','$jk')");
 
// mengalihkan halaman kembali ke index.php
header("location:siswaadmin.php");
 
?>