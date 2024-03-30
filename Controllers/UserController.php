<?php 
require_once 'Models/UserModel.php';

require_once 'Models/AdminModel.php';
class UserController{
    public function register(){
        $adminmodel = new AdminModel();
       
      
        if(  isset($_SESSION['is_login'] ) && $_SESSION['is_login'] == false){
            
      
         $faculty = $adminmodel->getAllFaculty();
         
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $dob=$_POST['dob'];
            $faculty=$_POST['fa_id'];
            // $check = $validateRegister($username,$password,$email,$fullname, $dob, $faculty);
            // if($check == true){
                $adminmodel->addStudentAccount($username, $password, $email, $fullname, $dob, 2, $faculty, null);
                header('location: index.php?action=login');
            // }
         }include 'views/register.php';
         
        }
    
    }
   
    public function login(){
        ob_start();

        $_SESSION['is_login'] = false;
      
        // include 'views/userlogin.php'
        if(  isset($_SESSION['is_login'] ) && $_SESSION['is_login'] == false){
            
    
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
                    header('location:admin_index.php');
                    exit() ;
                case 2:
                    header('location:views/student_index.php'); 
                    exit() ;
                case 3:
                    header('location:views/manager_index.php'); 
                    exit() ;
                case 4:
                    header('location:index.php?action=contribution'); 
                        exit() ;
                default: break;
            }
                    
        }
        else{
            $_SESSION['is_login'] = false;
            $err='sai ten';
           // include 'views/userlogin.php';
           //header('Location: index.php?action=login');           
        //   exit();
        }
    }  
   
}else{
    header('Location: index.php');   
}include 'views/userlogin.php';
     
ob_end_flush();
    }
    public function display_role(){

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
    //////////////////////////////////////////////////////////////////


    
    }

/////////////////
?>