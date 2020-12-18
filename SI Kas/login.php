<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="src/login.css">
    <script src="src/sweetAlert.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>      
        <form action="" method="post">
            <div class="field">
                <input type="text" name="username" id="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="password" required>
                <label>Password</label> 
            </div>
            <div class="field">
                <input type="submit" value="Masuk" name="login">
            </div>
        </form>
    </div>
    <noscript>
          Javascript anda tidak aktif,
          Mohon diktifkan untuk bisa mengakses web ini.
    </noscript>
</body>
</html>
<!-- logic -->
<?php 
include "config/config.php";
session_start();

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["login"]) ){
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $_POST["username"];

    $result = mysqli_query($connect,"SELECT *FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        // cek password
        if(password_verify($password, $row["password"])){
            // set session
            $_SESSION['login'] = true;
            $_SESSION['user'] = $row['level']; 
            //cek login sebagai admin
            if($row['level'] == "admin"){ ?>
                <script>
                    swal('Selamat Anda Berhasil Login!!','','success');
                    setTimeout(function () {
                    document.location.href = "index.php";
                    }, 1500);
                </script>
            <?php }elseif($row['level'] == "user"){ ?>
            <script>
                swal('Selamat Anda Berhasil Login!!','','success');
                setTimeout(function () {
                document.location.href = "user.php";
                }, 1500);
            </script>
            <?php } 
        exit;}
    }

    $error = true;
}
// apabila password / username tidak sesuai
if(isset($error)){?>
    <script>
        swal("Maaf Password Anda Salah!","Silahkan ulangi!","warning");
    </script>
<?php } ?>