<?php
require_once 'Models/adminModel.php';
require_once 'UserController.php';

class AdminController {
    private  $is_login;
    public function __construct() {
        $usercontroller = new UserController();
        $this->is_login = $usercontroller->is_login();
    }
    public function indexManager() {
        // Hiển thị danh sách Manager
         if($this->is_login == true && $_SESSION['role_id'] == 1) {
         $adminModel = new adminModel();
         if(isset( $_POST['username'])){
            $username =  $_POST['username'];
            $admin = $adminModel->getManagerAccountByName($username);
        }
       

        else {
        $admin = $adminModel->getAllManagerAccount();
        }
         include 'views/admin_list_manager.php';     
         } else if($this->is_login == true && $_SESSION['role_id'] != 1){
            echo'access dinied';
         }
         else  {
            header('Location: index.php?action=login');           
            exit();
        }
        
    }
    public function indexStudent() {
        // Hiển thị danh sách Manager
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
            if($_SERVER ['REQUEST_METHOD'] == 'POST') {
                if(isset( $_POST['username'])){
                    $username =  $_POST['username'];
                    $admin = $adminModel->getStudentAccountByName($username);
                }
                if(isset( $_POST['fa_id'])){
                $fa_id = $_POST['fa_id'];
                $admin = $adminModel->getStudentAccountByFaculty($fa_id);
                }
            }else{
                $admin = $adminModel->getAllStudentAccount();
            }
            $faculty = $adminModel->getAllFaculty() ;
            
            include 'views/admin_list_student.php';
        } else {
                echo"access dined";
            }
    }

    public function indexCoordinator() {
        // Hiển thị danh sách Manager
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel(); 
            if($_SERVER ['REQUEST_METHOD'] == 'POST') {
                
            if(isset( $_POST['username'])){
                $username =  $_POST['username'];
                $admin = $adminModel->getCoordinatorAccountByName($username);
            }
             if(isset( $_POST['fa_id'])){
            $fa_id = $_POST['fa_id'];
            $admin = $adminModel->getCoordinatorAccountByFaculty($fa_id);
            }
        }
            else{
            $admin = $adminModel->getAllCoordinatorAccount();
        } 
    
            $faculty = $adminModel->getAllFaculty() ;
            include 'views/admin_list_coordinator.php';
         } else {
                    echo"access dined";
                  }
                
    }

    public function insert_manager() {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            include 'views/admin_add_manager.php'; 
               // Xử lý thêm mới Manager

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){
                           
                    $imageData = file_get_contents($_FILES["avatar"]["tmp_name"]);
                    }  else{
                        $imageData=null;
                    }
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $roleId = $_POST['role_id'];
                
                if (!empty($username) && !empty($password) && !empty($email) && !empty($dob) && !empty($roleId)) {
                    // Kiểm tra Username có độ dài từ 4 đến 10 ký tự, không có khoảng trắng và không có ký tự đặc biệt
                    if (preg_match('/^\w{4,10}$/', $username)) {
                        $adminModel = new adminModel();
                        $adminModel->addManagerAccount($username, $password, $email, $dob, $roleId,$imageData);
                    
                        // Chuyển hướng sau khi thêm thành công
                        header('Location: index.php?action=manager');
                        exit();
                    }

           
       } else {
                  echo"access dined";

                }
            }
        } else {
                echo"access dined";
            }
        ob_end_flush();
    }

    

 

    public function update_manager($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                $admin = $adminModel->getManagerAccountById($id);
                include 'views/admin_edit_manager.php';
                // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                { 
                    $file = $_FILES["new_avatar"];
                    $imageData = file_get_contents($file["tmp_name"]);          
                }
                else{
                    $image = $_POST["avatar"];
                    $imageData = base64_decode($image);                  
                }
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];         
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];          
                    $adminModel = new AdminModel();
                    $adminModel->updateManagerAccount($id, $username, $password, $email,  $dob, $roleId, $imageData);
        
                    // Chuyển hướng sau khi cập nhật thành công
                    header('Location: index.php?action=manager');
                    exit();
                }
                }
        else {
                echo"access dined";
            }
        ob_end_flush();
    }

    public function delete_manager($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteManagerAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=manager');
        exit();
    }

    // public function add_student() {
    //     // Hiển thị form thêm mới Manager và truyền danh sách vai trò
    //     include 'views/admin_add_student.php'; 
    // }
    public function insert_student() {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
            $faculty = $adminModel->getAllFaculty() ;
            include 'views/admin_add_student.php'; 

             # Xử lý thêm mới student
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){
                           
                $imageData = file_get_contents($_FILES["avatar"]["tmp_name"]);
                }  else{
                    $imageData=null;
                }
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $email = $_POST['email'];
                  $fullname = $_POST['fullname'];
                  $dob = $_POST['dob'];
                  $role_Id = $_POST['role_id'];
                  $fa_id = $_POST['fa_id'];
                  $adminModel = new adminModel();
                  $adminModel->addStudentAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id,$imageData);

                  // Chuyển hướng sau khi thêm thành công
                header('Location: index.php?action=student');
                exit();
            }
        } else {
                echo"access dined";
            }
        ob_end_flush();
    }



    public function update_student($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                $admin = $adminModel->getStudentAccountById($id);
                $faculty = $adminModel->getAllFaculty();
                include 'views/admin_edit_student.php';
                
                // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                    { 
                        $file = $_FILES["new_avatar"];
                        $imageData = file_get_contents($file["tmp_name"]);          
                    }
                    else{
                        $image = $_POST["avatar"];
                        $imageData = base64_decode($image);                  
                    }
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];
                    $fa_id = $_POST['fa_id'];
        
                    $adminModel = new AdminModel();
                    $adminModel->updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);
        
                    // Chuyển hướng sau khi cập nhật thành công
                    header('Location: index.php?action=student');
                    exit();
                }
        } 
        else {
                echo"access dined";
            }
        ob_end_flush();
    }

    public function delete_student($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteStudentAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=student');
        exit();
    }

    public function insert_coordinator() {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
            $faculty = $adminModel->getAllFaculty() ;
            include 'views/admin_add_coordinator.php'; 
                    // Xử lý thêm mới Manager
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["tmp_name"])){
                           
                            $imageData = file_get_contents($_FILES["avatar"]["tmp_name"]);
                            }  else{
                                $imageData=null;
                            }
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $role_Id = $_POST['role_id'];
                        $fa_id = $_POST['fa_id'];
                      
                        $adminModel->addCoordinatorAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id,$imageData);
            
                        // Chuyển hướng sau khi thêm thành công
                        header('Location: index.php?action=coordinator');
                        exit();
                    }
            } 
            else {
                       echo"access dined";
                     }
        ob_end_flush();
    }

    

    public function update_coordinator($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                   $admin = $adminModel->getCoordinatorAccountById($id);
                   $faculty = $adminModel->getAllFaculty() ;
                   include 'views/admin_edit_coordinator.php';
                  
                   // Xử lý cập nhật Manager
                   if ($_SERVER['REQUEST_METHOD'] == 'POST') {               
                    if(isset($_FILES["new_avatar"]) && !empty($_FILES["new_avatar"]["tmp_name"]))
                { 
                    $file = $_FILES["new_avatar"];
                    $imageData = file_get_contents($file["tmp_name"]);          
                }
                else{
                    $image = $_POST["avatar"];
                    $imageData = base64_decode($image);                  
                }
                   
                       $username = $_POST['username'];
                       $password = $_POST['password'];
                       $email = $_POST['email'];
                       $fullname = $_POST['fullname'];
                       $dob = $_POST['dob'];
                       $roleId = $_POST['role_id'];
                       $fa_id = $_POST['fa_id'];
                       $adminModel = new AdminModel();
                       $adminModel->updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id,$imageData);

                       // Chuyển hướng sau khi cập nhật thành công
                     header('Location: index.php?action=coordinator');
                       exit();
                   }} 
           else {
                      echo"access dined";
                    }
        ob_end_flush();
    }

    public function delete_coordinator($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteCoordinatorAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php');
        exit();
    }
}
?>
