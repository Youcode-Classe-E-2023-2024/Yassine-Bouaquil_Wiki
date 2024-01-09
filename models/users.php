<?php
include_once 'database.php';
class Users extends Database {

    public function __construct($tableName) {
        $this->tableName = $tableName;
        parent::__construct();
    }
    public function signUp($firstName, $lastName, $email, $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $this->query("INSERT INTO $this->tableName(first_name, last_name, email, password) VALUES(:firsName, :lastName, :email, :password)");
        $this->bind(':firstName', $firstName);
        $this->bind(':lastName', $lastName);
        $this->bind(':email', $email);
        $this->bind(':password', $hashed);
        $this->execute();
    }
}