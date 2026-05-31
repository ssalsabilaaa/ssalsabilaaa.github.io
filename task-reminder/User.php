<?php

class User {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($username,$password){

        $query = $this->conn->query(
            "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'"
        );

        return $query;
    }
}
?>