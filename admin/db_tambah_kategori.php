<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"INSERT INTO kategori (nama) VALUES ('$nama')");
    // header("location:kategori.php");
    header("location:kategori.php?pesan=tambah");   
?>