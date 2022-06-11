<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id = $_POST['id'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"DELETE FROM supplier WHERE id_supplier='$id'");
    header("location:supplier.php?pesan=hapus");
    // header("location:supplier.php");
?>