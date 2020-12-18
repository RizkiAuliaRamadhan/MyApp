<?php 
include "config/session.php";
include "config/config.php";

if($_SESSION['user'] == "user"){
  header("Location: user.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kas</title>
    <link rel="stylesheet" href="src/style.css">
    <script src="src/sweetAlert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <nav>
      <div class="logo">
        Kas
      </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href="index.php?view=dashboard">Dasboard</a></li>
        <li><a href="index.php?view=pemasukan">Pemasukan</a></li>
        <li><a href="index.php?view=pengeluaran">Pengeluaran</a></li>
        <li><a href="index.php?view=user">User</a></li>
        <li><a href="registrasi.php">Registrasi</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="content">
      <?php 
        if (isset($_GET['view'])) {
            $view = $_GET['view'];

            switch ($view) {
                case 'pemasukan':
                    include 'view/admin/pemasukan.php';
                    break;
                case 'pengeluaran':
                    include 'view/admin/pengeluaran.php';
                    break;
                case 'tambah_pemasukan':
                    include 'view/admin/tambah_pemasukan.php';
                    break;
                case 'tambah_pengeluaran':
                    include 'view/admin/tambah_pengeluaran.php';
                    break;
                case 'hapus_pemasukan':
                    include 'view/admin/hapus_pemasukan.php';
                    break;
                case 'hapus_pengeluaran':
                    include 'view/admin/hapus_pengeluaran.php';
                    break;
                case 'update_pemasukan':
                    include 'view/admin/update_pemasukan.php';
                    break;
                case 'update_pengeluaran':
                    include 'view/admin/update_pengeluaran.php';
                    break;
                case 'user':
                    include 'view/admin/user.php';
                    break;
                case 'hapus_user':
                    include 'view/admin/hapus_user.php';
                    break;
                
                default:
                    include 'view/admin/dashboard.php';
                    break;
              }
          }else{
              include 'view/admin/dashboard.php';
          }
        ?>
    </div>

    <div class="footer">
        Copyright &copy; 2020
        Designed by Rama
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="src/formatRupiah.js"></script>
    <noscript>
          Javascript anda tidak aktif,
          Mohon diktifkan untuk bisa mengakses web ini.
    </noscript>
</body>
</html>