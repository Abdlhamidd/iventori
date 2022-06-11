
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIGUDANG | Pegawai</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href=" " class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../assets/index3.html" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIGUDANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pegawai.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="supplier.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="barang_masuk.php" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card card-dark card-outline">
              <div class="card-header">
              <?php 
                if(isset($_GET['pesan'])){
                  $pesan = $_GET['pesan'];
                  if($pesan == "tambah"){
                    echo '<div class="alert alert-success text-center mb-4"  role="alert"> Data Berhasil Ditambahkan</div>';
                  }else if($pesan == "ubah"){
                    echo '<div class="alert alert-success text-center mb-4"  role="alert"> Data Berhasil Diubah</div>';
                  }else if($pesan == "gagal"){
                    echo '<div class="alert alert-danger text-center mb-4"  role="alert"> Data Gagal di tambahkan</div>';
                  }else if($pesan == "sudahada"){
                    echo '<div class="alert alert-danger text-center mb-4"  role="alert"> Username Sudah Ada! Gunakan Username lain.</div>';
                  }else if($pesan == "hapus"){
                    echo '<div class="alert alert-success text-center mb-4"  role="alert"> Data Berhasil Dihapus</div>';
                  }
                }
                ?>
              <h2 class="card-title">
              <i class="fas fa-user"></i>  
              Pegawai
              </h2>			  
			          <a class="btn btn-success btn-sm fa-pull-right" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus"></i> Tambah</a>              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pegawai</th>
                      <th>Alamat</th>
                      <th>No HP/WA</th>
                      <th>Jabatan</th>
                      <th>Username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    include "../config.php";
                    $query_mysql = mysqli_query($conn,"SELECT * FROM akun");
                    $nomor = 1;
                    foreach($query_mysql as $data){
                    ?>
                  <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td><?php echo $data['jabatan']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                          <a class="btn btn-warning btn-sm" title="Edit" data-toggle="modal" data-target="#editdata<?php echo $data['id_akun']; ?>"><i class="fa fa-edit"></i></a>                  						
                          <a class="btn btn-danger btn-sm"  title="Hapus" data-toggle="modal" href="#hapusdata<?php echo $data['id_akun']; ?>" class="btn btn-small"><i class="fa fa-trash"></i></a>
						            </div>
                    </td>
                  </tr>
						<?php } ?>                                                      
                  </tbody>
                </table>
              </div>
            </div>                    
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- alert tambah data -->
  <div class="modal fade" id="tambahdata">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="db_Tambah_pegawai.php" method="POST">
                <div class="input-group mb-3">
                  <input type="text" maxlength="30" class="form-control" name="nama" placeholder="Nama Pegawai" required>
                </div>
                <div class="input-group mb-3">
                  <input type="text" maxlength="30" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>
                <div class="input-group mb-3">
                  <input type="number" maxlength="30" class="form-control" name="no_hp" placeholder="No HP/WA" required>
                </div>
                <div class="input-group mb-3">                    
                  <select class="form-control" name="jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="Pemilik">Pemilik</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <input type="text" maxlength="30" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="input-group mb-3">
                  <input type="password" maxlength="30" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

  <!-- alert ubah data -->
      <?php 
        include "../config.php";
        $query_mysql = mysqli_query($conn,"SELECT * FROM akun");
        while($data = mysqli_fetch_array($query_mysql)){
      ?>
       <div class="modal fade" id="editdata<?php echo $data['id_akun']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="db_ubah_pegawai.php" method="POST">
              <label> Nama Pegawai</label>
                <div class="input-group mb-2">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_akun']; ?>">
                  <input type="text" maxlength="30" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" placeholder="Nama Pegawai" required>
                </div>
                <label> Alamat</label>
                <div class="input-group mb-2">
                  <input type="text" maxlength="30" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required>
                </div>
                <label> No HP/WA</label>
                <div class="input-group mb-2">
                  <input type="text" maxlength="30" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" placeholder="No HP?WA" required>
                </div>
                <label>Jabatan</label>
                <div class="input-group mb-2">                    
                  <select class="form-control" name="jabatan" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <option <?php echo $data['jabatan'] == 'Pemilik' ? 'selected' : null ?> value="Pemilik">Pemilik</option>
                    <option <?php echo $data['jabatan'] == 'Admin' ? 'selected' : null ?> value="Admin">Admin</option>
                  </select>
                </div>
                <label>Username</label>
                <div class="input-group mb-2">
                  <input type="text" maxlength="30" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Username" required>
                </div>
                <label>Password</label>
                <div class="input-group mb-2">
                  <input type="password" maxlength="30" class="form-control" name="password" value="<?php echo $data['password']; ?>" placeholder="Password" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>


  <!-- alert hapus data -->
      <?php 
        include "../config.php";
        $query_mysql = mysqli_query($conn,"SELECT * FROM akun");
        while($data = mysqli_fetch_array($query_mysql)){
      ?>
       <div class="modal fade" id="hapusdata<?php echo $data['id_akun']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Yankin Ingin menghapus data Pegawai?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="db_hapus_pegawai.php" method="POST">
                  <input type="hidden" maxlength="30" class="form-control" name="id" value="<?php echo $data['id_akun']; ?>" placeholder="Nama kategori" required>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 Sinar Listrik.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": true, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>