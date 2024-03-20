<?php
require_once 'Models/adminModel.php';

class AdminController {
    public function indexManager() {
        // Hiển thị danh sách Manager
        $adminModel = new adminModel();
        $admin = $adminModel->getAllManagerAccount();
        include 'views/admin_list_manager.php';
    }
    public function indexStudent() {
        // Hiển thị danh sách Manager
        $adminModel = new adminModel();
        $admin = $adminModel->getAllStudentAccount();
        include 'views/admin_list_student.php';
    }

    public function add_manager() {
        // Hiển thị form thêm mới Manager và truyền danh sách vai trò
        include 'views/admin_add_manager.php'; 
    }

    public function insert_manager() {
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
    }

    public function edit_manager($id) {
        // Hiển thị form chỉnh sửa Manager
        $adminModel = new AdminModel();
        $admin = $adminModel->getManagerAccountById($id);
        include 'views/admin_edit_manager.php';
    }

    public function update_manager($id) {
        // Xử lý cập nhật Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];

            $adminModel = new AdminModel();
            $adminModel->updateManagerAccount($id, $username, $password, $email, $dob, $roleId);

            // Chuyển hướng sau khi cập nhật thành công
            header('Location: index.php');
            exit();
        }
    }

    public function delete_manager($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteManagerAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php');
        exit();
    }

    public function add_student() {
        // Hiển thị form thêm mới Manager và truyền danh sách vai trò
        include 'views/admin_add_student.php'; 
    }
    public function insert_student() {
        // Xử lý thêm mới Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];
            $fa_id = $_POST['fa_id'];
            $adminModel = new adminModel();
            $adminModel->addStudentAccount($username, $password, $email, $fullname, $dob, $roleId, $fa_id);

            // Chuyển hướng sau khi thêm thành công
            header('Location: index.php');
            exit();
        }
    }

    public function edit_student($id) {
        // Hiển thị form chỉnh sửa Manager
        $adminModel = new AdminModel();
        $admin = $adminModel->getStudentAccountById($id);
        include 'views/admin_edit_student.php';
    }

    public function update_student($id) {
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
            header('Location: index.php');
            exit();
        }
    }

    public function delete_student($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteStudentAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php');
        exit();
    }
}
?>
