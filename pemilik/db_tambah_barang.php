<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$stok = $_POST['stok'];
$nama_barang = $_POST['nama'];
$id_kategori = $_POST['id_kategori'];
 
// query memasukan data ke database
    $data = mysqli_query($conn,"INSERT INTO barang (nama_barang, stok, id_kategori) VALUES ('$nama_barang', '$stok', '$id_kategori')");
    header("location:barang.php?pesan=tambah");   
?>