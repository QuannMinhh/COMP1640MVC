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
}