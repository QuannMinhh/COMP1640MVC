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
         $admin = $adminModel->getAllManagerAccount();
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
                   $admin = $adminModel->getAllStudentAccount();
                   include 'views/admin_list_student.php';
           } else {
                      echo"access dined";
                    }
    }

    public function indexCoordinator() {
        // Hiển thị danh sách Manager
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new adminModel();
                 $admin = $adminModel->getAllCoordinatorAccount();
                 include 'views/admin_list_coordinator.php';
         } else {
                    echo"access dined";
                  }
    }

    // public function add_manager() {
    //     // Hiển thị form thêm mới Manager và truyền danh sách vai trò
    //     include 'views/admin_add_manager.php'; 
    // }

    public function insert_manager() {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            include 'views/admin_add_manager.php'; 
               // Xử lý thêm mới Manager
               if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   $username = $_POST['username'];
                   $password = $_POST['password'];
                   $email = $_POST['email'];
                   $dob = $_POST['dob'];
                   $roleId = $_POST['role_id'];
       
                   $adminModel = new adminModel();
                   $adminModel->addManagerAccount($username, $password, $email, $dob, $roleId);
       
                   // Chuyển hướng sau khi thêm thành công
                   header('Location: index.php');
                   exit();
               }
       } else {
                  echo"access dined";
                }
        ob_end_flush();
    }

    // public function edit_manager($id) {
    //     // Hiển thị form chỉnh sửa Manager
    //     $adminModel = new AdminModel();
    //     $admin = $adminModel->getManagerAccountById($id);
    //     include 'views/admin_edit_manager.php';
    // }

    public function update_manager($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                $admin = $adminModel->getManagerAccountById($id);
                include 'views/admin_edit_manager.php';
                // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];         
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];          
                    $adminModel = new AdminModel();
                    $adminModel->updateManagerAccount($id, $username, $password, $email,  $dob, $roleId, );
        
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
        header('Location: index.php');
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
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $email = $_POST['email'];
                  $fullname = $_POST['fullname'];
                  $dob = $_POST['dob'];
                  $role_Id = $_POST['role_id'];
                  $fa_id = $_POST['fa_id'];
                  $adminModel = new adminModel();
                  $adminModel->addStudentAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id);
      
                  // Chuyển hướng sau khi thêm thành công
                  header('Location: index.php?action=student');
                  exit();
              }
      } else {
                 echo"access dined";
               }
        ob_end_flush();
    }

    // public function edit_student($id) {
    //     // Hiển thị form chỉnh sửa Manager
    //     $adminModel = new AdminModel();
    //     $admin = $adminModel->getStudentAccountById($id);
    //     include 'views/admin_edit_student.php';
    // }

    public function update_student($id) {
        ob_start();
        if($this->is_login == true && $_SESSION['role_id'] == 1) {
            $adminModel = new AdminModel();
                $admin = $adminModel->getStudentAccountById($id);
                
                include 'views/admin_edit_student.php';
                
                // Xử lý cập nhật Manager
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $dob = $_POST['dob'];
                    $roleId = $_POST['role_id'];
                    $fa_id = $_POST['fa_id'];
        
                    $adminModel = new AdminModel();
                    $adminModel->updateStudentAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id);
        
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
            include 'views/admin_add_coordinator.php'; 
                    // Xử lý thêm mới Manager
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $fullname = $_POST['fullname'];
                        $dob = $_POST['dob'];
                        $role_Id = $_POST['role_id'];
                        $fa_id = $_POST['fa_id'];
                        $adminModel = new adminModel();
                        $adminModel->addCoordinatorAccount($username, $password, $email, $fullname, $dob, $role_Id, $fa_id);
            
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
                   
                   include 'views/admin_edit_coordinator.php';
                   
                   // Xử lý cập nhật Manager
                   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                       $username = $_POST['username'];
                       $password = $_POST['password'];
                       $email = $_POST['email'];
                       $fullname = $_POST['fullname'];
                       $dob = $_POST['dob'];
                       $roleId = $_POST['role_id'];
                       $fa_id = $_POST['fa_id'];
           
                       $adminModel = new AdminModel();
                       $adminModel->updateCoordinatorAccount($id, $username, $password, $email, $fullname, $dob, $roleId, $fa_id);
           
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
