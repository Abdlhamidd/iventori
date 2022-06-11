<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];
$username = $_POST['username'];
$password = $_POST['password'];

// cek username sudah ada atau belum
$cek = mysqli_query($conn,"SELECT * FROM akun WHERE username='$username'");
if(mysqli_num_rows($cek) == 0){
    // jika username belum ada, maka simpan
    $data = mysqli_query($conn,"INSERT INTO akun(nama,no_hp,alamat,jabatan,username,password) VALUES('$nama','$no_hp','$alamat','$jabatan','$username','$password')");
    if($data){
        header("location:pegawai.php?pesan=tambah");  // jika berhasil maka akan diarahkan ke halaman admin
    }else{
        header("location:pegawai.php?pesan=gagal");  // jika gagal maka akan diarahkan ke halaman admin
    }
}else{
    // jika username sudah ada, maka tampilkan pesan
    header("location:pegawai.php?pesan=sudahada");
} 
?>