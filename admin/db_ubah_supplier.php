<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"UPDATE supplier SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id_supplier='$id'");
    header("location:supplier.php?pesan=ubah");
    // header("location:supplier.php");
?>