<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"UPDATE kategori SET nama='$nama' WHERE id_kategori='$id'");
    header("location:kategori.php?pesan=ubah");
    // header("location:kategori.php");
?>