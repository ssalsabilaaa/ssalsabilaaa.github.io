<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location:login.php");
    exit;
}

include "Database.php";
include "Tugas.php";

$db = new Database();
$conn = $db->connect();

$tugas = new Tugas($conn);

$id = $_GET['id'];

$tugas->hapus($id);

header("Location:index.php");