<?php

include "Database.php";
include "Tugas.php";

$db = new Database();
$conn = $db->connect();

$tugas = new Tugas($conn);

if(isset($_POST['simpan'])){

    $tugas->tambah(
        $_POST['nama_tugas'],
        $_POST['mata_pelajaran'],
        $_POST['deadline'],
        $_POST['prioritas']
    );

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
</head>
<body>

<h2>Tambah Tugas</h2>

<form method="POST">

<label>Nama Tugas</label>
<br>
<input type="text" name="nama_tugas">

<br><br>

<label>Mata Pelajaran</label>
<br>
<input type="text" name="mata_pelajaran">

<br><br>

<label>Deadline</label>
<br>
<input type="date" name="deadline">

<br><br>

<label>Prioritas</label>
<br>

<select name="prioritas">
    <option>Rendah</option>
    <option>Sedang</option>
    <option>Tinggi</option>
</select>

<br><br>

<button name="simpan">
Simpan
</button>

</form>

</body>
</html>