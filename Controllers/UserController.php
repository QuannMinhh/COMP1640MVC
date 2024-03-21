<?php 
require_once 'Models/UserModel.php';

class UserController{
    public function login(){
        ob_start();
        
        $_SESSION['is_login'] = false;
        if(  isset($_SESSION['is_login'] ) && $_SESSION['is_login'] == false){
       header('location:views/userlogin.php');     
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role_id = $_POST['role_id'];
        $usermodel = new UserModel();
        $user = $usermodel->check_login($username, $password,$role_id);
        if($user){
            $_SESSION['is_login'] = true;
            $_SESSION['role_id'] = $role_id;
            switch( $_SESSION['role_id'])
            {
                case 1:
                    header('location:index.php');
                    exit() ;
                case 2:
                    header('location:views/student_index.php'); 
                    exit() ;
                default: break;
            }
                    
        }
        else{
            $_SESSION['is_login'] = false;
            header('Location: index.php?action=login');           
            exit();
        }
    }
   
}else{
    header('Location: index.php');   
}

ob_end_flush();
    }
    public function is_login() {
        if( $_SESSION['is_login'] == false ){
           return false;
        }
        else{
           return true;
        }
    }

    public function logout(){
       
        session_unset();
        session_destroy();
        $_SESSION['is_login'] = false;
        header("Location:index.php?action=login"); 
        exit();
    }
}

?>