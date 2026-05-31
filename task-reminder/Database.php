<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "task_reminder";

    public function connect() {

        $conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        return $conn;
    }
}
?>