<?php
require_once 'Config/db.php';

class ContributionModel {
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getAllContribution()
    {
        $query = "SELECT * FROM Contribution where Con_Status = 1 ";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContributionById($id)
    {
        $query = "SELECT * FROM contribution WHERE Con_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function getContributionToComment($id)
    {
        $query = "SELECT * FROM contribution WHERE Con_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public function addContribution($conname, $subDate, $status, $stuID, $doc, $image, $topicID, $comID, $magaID) {
        $query = "INSERT INTO Contribution (Con_Name, Con_SubmissionTime, Con_Status, Con_Doc, Con_Image, Stu_ID, Topic_ID, Com_ID, Maga_ID) 
                VALUES (:name, :submissionTime, :status, :doc, :image, :stu_ID, :topic_ID, :com_ID, :maga_ID)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':name' => $conname, ':submissionTime' => $subDate, ':status' => $status, ':doc' => $doc, ':image' => $image, ':stu_ID' => $stuID, ':topic_ID' => $topicID, ':com_ID' => null, ':maga_ID' => null));
    }
    
    public function updateContribution($conname, $subDate, $status, $stuID, $doc, $image, $topicID, $comID, $magaID) {
        $query = "UPDATE Contribution SET Con_Name = :name, Con_SubmissionTime = :submissionTime, Con_Status = :status, Con_Doc = :doc, Con_Image = :image, Stu_ID = :stu_ID, Topic_ID = :topic_ID, Com_ID = :com_ID, Maga_ID = :maga_ID 
                WHERE Con_ID = :Con_ID";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':name' => $conname, ':submissionTime' => $subDate, ':status' => $status, ':doc' => $doc, ':image' => $image, ':stu_ID' => $stuID, ':topic_ID' => $topicID, ':com_ID' => $comID, ':maga_ID' => $magaID));
    }
    
    
    
    public function deleteContribution($id) {
        $query = "DELETE FROM Contribution WHERE Con_ID = :Con_ID";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}