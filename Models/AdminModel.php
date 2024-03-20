<?php
require_once 'Config/db.php';

class AdminModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllAccount() {
        $query = "SELECT * FROM Admin";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAccountById($id) {
        $query = "SELECT * FROM Admin WHERE Ad_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addAccount($username, $password, $email, $dob, $roleId) {
        $query = "INSERT INTO Admin (Ad_Username, Ad_Password, Ad_Email, Ad_DOB, Role_ID) VALUES (:username, :password, :email, :dob, :role_id)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId));
    }

    public function updateAccount($id, $username, $password, $email, $dob, $roleId) {
        $query = "UPDATE Admin SET Ad_Username = :username, Ad_Password = :password, Ad_Email = :email, Ad_DOB = :dob, Role_ID = :role_id WHERE Ad_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id));
    }

    public function deleteAccount($id) {
        $query = "DELETE FROM Admin WHERE Ad_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }
}
?>
