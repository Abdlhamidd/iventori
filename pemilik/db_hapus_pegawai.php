<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id = $_POST['id'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"DELETE FROM akun WHERE id_akun='$id'");
    header("location:pegawai.php?pesan=hapus");
    // header("location:supplier.php");
?>