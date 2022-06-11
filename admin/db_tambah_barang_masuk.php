<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id_supplier = $_POST['id_supplier'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];


// menampilkan data stok barang
$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$data = mysqli_fetch_array($query);
$stok = $data['stok'];
$stok_barang = $stok + $jumlah;

// menambahkan data stok barang
$query = mysqli_query($conn, "UPDATE barang SET stok='$stok_barang' WHERE id_barang='$id_barang'");

// menambahkan data barang masuk
$query = mysqli_query($conn, "INSERT INTO barang_masuk VALUES('','$id_supplier','$id_barang','$tanggal','$jumlah')");
if ($query) {
    echo "<script>alert('Data berhasil ditambahkan');</script>";
    echo "<script>location='barang_masuk.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
    echo "<script>location='barang_masuk.php';</script>";
}
?>