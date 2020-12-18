<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>register</title>
    <link rel="stylesheet" href="src/login.css">
    <script src="src/sweetAlert.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
        <div class="title">
            Sign Up Form
        </div>
        <form action="" method="post">
            <div class="field">
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="field">
                <input type="text" name="level" id="level" required>
                <label for="level">Level (admin/user)</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <div class="field">
                <input type="password" name="password1" id="password1" required>
                <label for="password1">Konfirmasi Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Daftar" name="register">
            </div>
        </form>
    </div>
</body>
</html>

<!-- Logic -->
<?php 
include "config/session.php";
include "config/config.php";

if($_SESSION['user'] == "user"){
    header("Location: user.php");
  }

// function registrasi
function registrasi($data){
    global $connect;

    // $user_id = $data['user_id'];
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($connect,$data['password']);
    $password1 = mysqli_real_escape_string($connect,$data['password1']);
    $level = $data['level'];

    // cek username ada yang sama apa tidak
    $result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username' ");

	if(mysqli_fetch_assoc($result)){ ?>
        <script>
			swal ('username sudah terdaftar!','','info');
		</script>
	<?php return false; } 

    // konfirmasi password 
    if($password !== $password1){ ?>
        <script>
            swal('Konfirmasi password salah','','warning');
        </script>";
        <?php return false;}

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // insert ke database
    $query = "INSERT INTO user VALUES (NULL ,'$username','$password','$level')";
    mysqli_query($connect,$query);

    return mysqli_affected_rows($connect);
}

// tombol register diklik
if(isset($_POST["register"])){

    if( registrasi($_POST) > 0 ) { ?>
        <script>
            swal('user baru berhasil ditambahkan!!','','success');
            setTimeout(function () {
             document.location.href = "login.php";
             }, 2500);
        </script>
    <?php }else { ?>
        <script>
            swal('user gagal ditambahkan!!','','error');
        </script>
    <?php }
}
?> 