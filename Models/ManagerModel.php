<?php
require_once 'Config/db.php';

class ManagerModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllManagers() {
        $query = "SELECT * FROM Manager";
        $sql = $this->db->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getManagerById($id) {
        $query = "SELECT * FROM Manager WHERE Ma_ID = :id";
        $sql = $this->db->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addManager($username, $password, $email, $dob, $roleId) {
        $query = "INSERT INTO Manager (Ma_Username, Ma_Password, Ma_Email, Ma_DOB, Role_ID) VALUES (:username, :password, :email, :dob, :role_id)";
        $sql = $this->db->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId));
    }

    public function updateManager($id, $username, $password, $email, $dob, $roleId) {
        $query = "UPDATE Manager SET Ma_Username = :username, Ma_Password = :password, Ma_Email = :email, Ma_DOB = :dob, Role_ID = :role_id WHERE Ma_ID = :id";
        $sql = $this->db->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id));
    }

    public function deleteManager($id) {
        $query = "DELETE FROM Manager WHERE Ma_ID = :id";
        $sql = $this->db->prepare($query);
        $sql->execute(array(':id' => $id));
    }
}
?>
