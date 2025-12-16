<?php
session_start();
if (isset($_SESSION['username'])) {
    // User sudah login, langsung ke home
    header("Location: home.php");
    exit;
}
include "connect.php";



$error = "";
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Visual Algoritma</title>
<style>
body {
    margin:0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background:#ffffff;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}
.login-container {
    background:#ffffff;
    padding:40px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    width:320px;
    text-align:center;
}
.login-container img.logo { width:80px; margin-bottom:20px; }
.login-container h2 { margin-bottom:20px; color:#333; }
.login-container input {
    width:100%; padding:12px; margin:10px 0;
    border:1px solid #ccc; border-radius:8px; font-size:16px;
}
.login-container button {
    width:100%; padding:12px; margin-top:15px;
    background:#3498db; border:none; color:white;
    font-size:16px; border-radius:8px; cursor:pointer;
}
.login-container button:hover { background:#2980b9; }
.error { color:red; margin-bottom:10px; }
</style>
</head>
<body>
<div class="login-container">
    <img src="assets/image/2080844.png" alt="Logo" class="logo">
    <h2>Login Visual Algoritma</h2>
    <?php if($error!="") echo "<p class='error'>$error</p>"; ?>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
