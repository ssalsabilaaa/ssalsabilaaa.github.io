<?php

session_start();

include "Database.php";
include "User.php";

$db = new Database();
$conn = $db->connect();

$user = new User($conn);

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = $user->login(
        $username,
        $password
    );

    if($cek->num_rows > 0){

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location:index.php");
        exit;

    }else{

        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-box">

<h2>Login Task Reminder</h2>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<br><br>

<input
type="password"
name="password"
placeholder="Password"
required>

<br><br>

<button name="login">
Login
</button>

</form>

</div>

</body>
</html>