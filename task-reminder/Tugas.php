<?php

class Tugas {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tampil() {
        return $this->conn->query(
            "SELECT * FROM tugas ORDER BY deadline ASC"
        );
    }

    public function tambah($nama, $mapel, $deadline, $prioritas) {

        $query = "INSERT INTO tugas
        (nama_tugas,mata_pelajaran,deadline,prioritas,status)
        VALUES
        (
        '$nama',
        '$mapel',
        '$deadline',
        '$prioritas',
        'Belum Selesai'
        )";

        return $this->conn->query($query);
    }

    public function hapus($id) {
        return $this->conn->query(
            "DELETE FROM tugas WHERE id=$id"
        );
    }
}
?>