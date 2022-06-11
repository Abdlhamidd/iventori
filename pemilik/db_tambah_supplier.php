<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"INSERT INTO supplier (no_hp, nama, alamat) VALUES ('$no_hp', '$nama', '$alamat')");
    // header("location:supplier.php");
    header("location:supplier.php?pesan=tambah");
?>