<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$id_kategori = $_POST['id_kategori'];
 
// menyeleksi data admin dengan email dan password yang sesuai
    $data = mysqli_query($conn,"UPDATE barang SET nama_barang='$nama_barang', stok='$stok', id_kategori='$id_kategori' WHERE id_barang='$id_barang'");
    header("location:barang.php?pesan=ubah");
    if($data){
        echo "script>alert('Data berhasil diubah');</script>";
        header("location:barang.php?pesan=ubah");
    }else{
        header("location:barang.php?pesan=gagal");
    }
?>