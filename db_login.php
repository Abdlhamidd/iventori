<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = ($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from akun where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$result = mysqli_fetch_array($data);
      if ($result!='') 
      {
          $_SESSION['username'] = $result['username'];
          if ($result['jabatan']=='Pemilik') {
            header("location:pemilik/dashboard.php");
          }else{
            header("location:admin/dashboard.php");
          }
      } 
      else
      {
        header("location:login.php?pesan=gagal");
      }
?>