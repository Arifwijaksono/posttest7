<?php
session_start();
require 'database.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_username = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $cek_username);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;

            echo "<script>
                alert('Login berhasil!');
                document.location.href = 'home/home.php';
            </script>";
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="kotak_login">
        <p class="tulisan_login">Login</p>
        <?php if (isset($error)) : ?>
        <center>
            <p style="color: red; font-weight:600;">Username/Password is Wrong!</p>
        </center>
        <?php endif; ?>
        <form action="" method="post">
            <label>Username</label>
            <input type="text" id="username" name="username" placeholder="Username" class="form_login" required>

            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="form_login" required>

            <input type="submit" class="tombol_login" name="login" placeholder="Log In">

            <br />
            <br />
            <center>
                Not a member ?<a class="link" href="registrasi.php"> Sign Up</a>
            </center>
        </form>
    </div>
</body>

</html>