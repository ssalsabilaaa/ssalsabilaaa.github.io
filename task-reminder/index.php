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
$data = $tugas->tampil();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Reminder</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

<body class="dashboard-page">

<div class="header">
    <h1>Task Reminder</h1>

    <div class="user-menu">
        👤 <?= $_SESSION['username']; ?>
        <a href="logout.php" class="logout-btn">
            Logout
        </a>
    </div>
</div>

<?php if(isset($_SESSION['welcome'])): ?>

<div class="welcome-bubble">
    ✅ Berhasil Login!
    <br>
    Selamat datang,
    <b><?= $_SESSION['username']; ?></b>
</div>

<?php unset($_SESSION['welcome']); ?>

<?php endif; ?>

<a href="tambah.php" class="btn">
Tambah Tugas
</a>

<div class="info-deadline">

    <span class="legend merah">
        ● Deadline Terlewat
    </span>

    <span class="legend oranye">
        ● Deadline ≤ 3 Hari
    </span>

    <span class="legend hijau">
        ● Deadline Masih Lama
    </span>

</div>

<table>

<tr>
    <th>No</th>
    <th>Nama Tugas</th>
    <th>Mata Pelajaran</th>
    <th>Deadline</th>
    <th>Prioritas</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($row = $data->fetch_assoc()){

    $hari_ini = date("Y-m-d");

if($row['deadline'] < $hari_ini){

    $warna = "red";

}elseif(
    strtotime($row['deadline'])
    <= strtotime("+3 day")
){

    $warna = "orange";

}else{

    $warna = "green";
}
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama_tugas'] ?></td>
    <td><?= $row['mata_pelajaran'] ?></td>

    <td style="color:<?= $warna ?>;">
    <?= $row['deadline'] ?>
    </td>

    <td><?= $row['prioritas'] ?></td>
    <td><?= $row['status'] ?></td>

    <td>
        <a
        href="hapus.php?id=<?= $row['id'] ?>"
        onclick="return confirm('Yakin ingin menghapus tugas ini?')">
         Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>