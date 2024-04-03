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
    public function addContribution($conname, $subDate, $status, $stuID, $doc, $image, $topicID, $comID, $magaID) {
        $query = "INSERT INTO Contribution (Con_Name, Con_SubmissionTime, Con_Status, Con_Doc, Con_Image, Stu_ID, Topic_ID, Com_ID, Maga_ID) 
                VALUES (:name, :submissionTime, :status, :doc, :image, :stu_ID, :topic_ID, :com_ID, :maga_ID)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':name' => $conname, ':submissionTime' => $subDate, ':status' => $status, ':doc' => $doc, ':image' => $image, ':stu_ID' => $stuID, ':topic_ID' => $topicID, ':com_ID' => null, ':maga_ID' => null));
    }

    public function getStudentbyUserName($username)
    {
        $query = "SELECT * from student where Stu_Username = :username;";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':username'=> $username));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}