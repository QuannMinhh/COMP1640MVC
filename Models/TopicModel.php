<?php
require_once 'Config/db.php';

class TopicModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllTopic()
    {
        $query = "SELECT * FROM Topic";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopicById($id)
    {
        $query = "SELECT * FROM Topic WHERE Topic_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function addTopic($name, $startDate, $closureDate, $finaleDate, $descriptions, $fa_id)
{
    $query = "INSERT INTO Topic (Topic_Name, Topic_StartDate, Topic_ClosureDate, Topic_FinaleDate, Topic_Description, Fa_ID) VALUES (:name, :startDate, :closureDate, :finaleDate, :descriptions, :fa_id)";
    $sql = $this->conn->prepare($query);
    $sql->execute(array(':name' => $name, ':startDate' => $startDate, ':closureDate' => $closureDate, ':finaleDate' => $finaleDate, ':descriptions' => $descriptions, ':fa_id' => $fa_id));
}


public function updateTopic($id, $name, $startDate, $closureDate, $finaleDate, $descriptions, $fa_id)
{
    $query = "UPDATE Topic SET Topic_Name = :name, Topic_StartDate = :startDate, Topic_ClosureDate = :closureDate, Topic_FinaleDate = :finaleDate, Topic_Description = :descriptions, Fa_ID = :fa_id WHERE Topic_ID = :id";
    $sql = $this->conn->prepare($query);
    $sql->execute(array(':id' => $id, ':name' => $name, ':startDate' => $startDate, ':closureDate' => $closureDate, ':finaleDate' => $finaleDate, ':descriptions' => $descriptions, ':fa_id' => $fa_id));
}


    public function deleteTopic($id)
    {
        $query = "DELETE FROM Topic WHERE Topic_ID = :id";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':id' => $id));
    }
}
?>