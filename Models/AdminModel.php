<?php
require_once 'Config/db.php';

class AdminModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllRoles()
    {
        $query = "SELECT * FROM Role";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllManagerAccount()
    {
        $query = "SELECT * FROM Manager";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getManagerAccountById($id)
    {
        $query = "SELECT * FROM Manager WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addManagerAccount($username, $password, $email, $dob, $roleId)
    {
        $query = "INSERT INTO Manager (Ma_Username, Ma_Password, Ma_Email, Ma_DOB, Role_ID) VALUES (:username, :password, :email, :dob, :role_id)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId));
    }

    public function updateManagerAccount($id, $username, $password, $email, $dob, $roleId)
    {
        $query = "UPDATE Manager SET Ma_Username = :username, Ma_Password = :password, Ma_Email = :email, Ma_DOB = :dob, Role_ID = :role_id WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':dob' => $dob, ':role_id' => $roleId, ':id' => $id));
    }

    public function deleteManagerAccount($id)
    {
        $query = "DELETE FROM Manager WHERE Ma_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }


  

    public function getAllStudentAccount() {
        $query = "SELECT * FROM Student Join Faculty ON Student.Fa_ID = Faculty.Fa_ID;";

        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllFaculty()
    {
        $query = "SELECT * FROM faculty";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudentAccountById($id)
    {
        $query = "SELECT * FROM Student WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addStudentAccount($username, $password, $email, $fullname, $dob, $roleId, $fa_id, $imageData)
    {
        $query = "INSERT INTO Student (Stu_Username, Stu_Password, Stu_Email, Stu_FullName, Stu_DOB, Role_ID, Fa_ID, Image) VALUES (:username, :password, :email, :fullname, :dob, :role_id, :fa_id, :imageData)";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':imageData' => $imageData));
    }

    public function updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id)
    {
        $query = "UPDATE Student SET Stu_Username = :username, Stu_Password = :password, Stu_Email = :email, Stu_FullName = :fullname, Stu_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id WHERE Stu_ID = :id";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id));
    }



    public function deleteStudentAccount($id)
    {
        $query = "DELETE FROM Student WHERE Stu_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }




    public function getAllCoordinatorAccount() {
        $query = "SELECT * FROM Coordinator Join Faculty ON Coordinator.Fa_ID = Faculty.Fa_ID";

        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCoordinatorAccountById($id)
    {
        $query = "SELECT * FROM Coordinator WHERE Coor_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addCoordinatorAccount($username, $password, $email, $fullname, $dob, $roleId, $fa_id)
    {
        $query = "INSERT INTO Coordinator (Coor_Username, Coor_Password, Coor_Email, Coor_FullName, Coor_DOB, Role_ID, Fa_ID) VALUES (:username, :password, :email, :fullname, :dob, :role_id, :fa_id)";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id));
    }

    public function updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id)
    {
        $query = "UPDATE Coordinator SET Coor_Username = :username, Coor_Password = :password, Coor_Email = :email, Coor_FullName = :fullname, Coor_DOB = :dob, Role_ID = :role_id, Fa_ID = :fa_id WHERE Coor_ID = :id";

        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username' => $username, ':password' => $password, ':email' => $email, ':fullname' => $fullname, ':dob' => $dob, ':role_id' => $roleId, ':fa_id' => $fa_id, ':id' => $id));
    }



    public function deleteCoordinatorAccount($id)
    {
        $query = "DELETE FROM Coordinator WHERE Coor_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }
}
?>