<?php 
require_once 'Config/db.php';

class UserModel{
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    public function check_login($username, $password,$role_id){
        $role = $role_id;
        switch ($role) {
            case 1 :
                $query = "SELECT * from admin where Ad_Username = :username";
                $sql = $this->conn->prepare($query);
                $sql->execute(array(":username"=> $username));
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                if($result['Ad_Password'] == $password){
                   return true;                  
                }
                else{
                   return false;
                }
                case 2 :
                    $query = "SELECT * from student where Stu_Username = :username";
                    $sql = $this->conn->prepare($query);
                    $sql->execute(array(":username"=> $username));
                    $result = $sql->fetch(PDO::FETCH_ASSOC);
                    if($result['Stu_Password'] == $password){
                       return true;                  
                    }
                    else{
                       return false;
                    }    
                default:
                return false;
                
        }
    }
    public function getAllRole(){
        $query ="SELECT * from role";
        $sql = $this->conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>