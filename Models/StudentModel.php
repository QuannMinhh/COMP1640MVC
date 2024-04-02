<?php
require_once 'Config/db.php';

class StudentModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function addContribution($name,$doc,$image,$Stu_ID,$Topic_ID){
        $query = "";

    }

    public function getStudentbyUserName($username)
    {
        $query = "SELECT * from student where Stu_Username = :username;";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username'=> $username));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}