<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id_barang_masuk = $_POST['id_barang_masuk'];
$id_supplier = $_POST['id_supplier'];
$id_barang = $_POST['id_barang'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];

// menampilkan data stok barang keluar
$query = mysqli_query($conn, "SELECT * FROM barang_masuk WHERE id_barang_masuk='$id_barang_masuk'");
$data = mysqli_fetch_array($query);
$stok_keluar = $data['bayak'];
// mendapatkan data stok barang
$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$data = mysqli_fetch_array($query);
$stok = $data['stok'];
$stok_barang = $stok - $stok_keluar;
$data_barang_update = $stok_barang + $jumlah;

// menambahkan data stok barang
$query = mysqli_query($conn, "UPDATE barang SET stok='$data_barang_update' WHERE id_barang='$id_barang'");

// update data barang masuk
$query = mysqli_query($conn, "UPDATE barang_masuk SET id_supplier='$id_supplier',id_barang='$id_barang',tanggal='$tanggal',bayak='$jumlah' WHERE id_barang_masuk='$id_barang_masuk'");
if ($query) {
    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>location='barang_masuk.php';</script>";
} else {
    echo "<script>alert('Data gagal diubah');</script>";
    echo "<script>location='barang_masuk.php';</script>";
}
?>