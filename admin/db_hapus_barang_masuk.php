<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$id_barang_masuk = $_POST['id_barang_masuk'];
$id_barang = $_POST['id_barang'];
$banyak = $_POST['banyak'];

// menampilkan data stok barang
$query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$data = mysqli_fetch_array($query);
$stok = $data['stok'];
$stok_barang = $stok - $banyak;

// menambahkan data stok barang
mysqli_query($conn, "UPDATE barang SET stok='$stok_barang' WHERE id_barang='$id_barang'");

// menghapus data barang masuk
$query = mysqli_query($conn, "DELETE FROM barang_masuk WHERE id_barang_masuk='$id_barang_masuk'");
if ($query) {
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>location='barang_masuk.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');</script>";
    echo "<script>location='barang_masuk.php';</script>";
}
?>