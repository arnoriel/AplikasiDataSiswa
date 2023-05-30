<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jk = $_POST['jk'];
 
// update data ke database
mysqli_query($koneksi,"update siswa set nama='$nama', kelas='$kelas', jk='$jk' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:siswaadmin.php");
 
?>