<?php 
include "config/session.php";
include "config/config.php";

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
        <li><a href="user.php?view=dashboard">Dasboard</a></li>
        <li><a href="user.php?view=pemasukan">Pemasukan</a></li>
        <li><a href="user.php?view=pengeluaran">Pengeluaran</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="content">
      <?php 
        if (isset($_GET['view'])) {
            $view = $_GET['view'];

            switch ($view) {
                case 'pemasukan':
                    include 'view/user/pemasukan.php';
                    break;
                case 'pengeluaran':
                    include 'view/user/pengeluaran.php';
                    break;
                
                default:
                    include 'view/user/dashboard.php';
                    break;
              }
          }else{
              include 'view/user/dashboard.php';
          }
        ?>
    </div>

    <div class="footer">
        Copyright &copy; 2020
        Designed by Rama
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="src/formatRupiah.js"></script>
</body>
</html>