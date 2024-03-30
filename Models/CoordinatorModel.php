<?php 
require_once "config/db.php";
class CoordinatorModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function addComment($Com_Detail,$Con_ID,$Coor_ID){
        $query = "INSERT INTO comments (Com_Detail,Con_ID,Coor_ID) 
        VALUES (:com_detail,:con_id,:coor_id)";
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':com_detail' => $Com_Detail, ':con_id' => $Con_ID, ':coor_id' => $Coor_ID));  
    }
    public function changeStatus($Con_ID){
        $query = 'UPDATE contribution set Con_Status = 2 where Con_ID =:con_id';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':con_id' => $Con_ID)) ;

    }
    public function checkDate($Con_ID){
        $query = 'SELECT * FROM contribution WHERE Con_ID=:con_id and TIMESTAMPDIFF(DAY, Con_SubmissionTime, NOW()) < 14';
        $sql = $this->conn->prepare($query);
        $sql->execute(array(':con_id' => $Con_ID)) ;
        if ($sql->rowCount() > 0) {
            return true;
            
        } else {
            return false;
        }
    }
    //////////////////
    public function download(){
        $query = "SELECT * FROM contribution WHERE Con_Status = 2";
        $sql = $this->conn->prepare($query);
         $sql->execute() ;
         return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }


?>