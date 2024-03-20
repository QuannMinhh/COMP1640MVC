<?php
require_once 'Models/adminModel.php';

class AdminController {
    public function index() {
        // Hiển thị danh sách Manager
        $adminModel = new adminModel();
        $admin = $adminModel->getAllAccount();
        include 'views/admin_list.php';
    }

    public function add() {
        // Hiển thị form thêm mới Manager
        include 'views/admin_add.php';
    }

    public function insert() {
        // Xử lý thêm mới Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];

            $adminModel = new adminModel();
            $adminModel->addAccount($username, $password, $email, $dob, $roleId);

            // Chuyển hướng sau khi thêm thành công
            header('Location: index.php');
            exit();
        }
    }

    public function edit($id) {
        // Hiển thị form chỉnh sửa Manager
        $adminModel = new AdminModel();
        $admin = $adminModel->getAccountById($id);
        include 'views/admin_edit.php';
    }

    public function update($id) {
        // Xử lý cập nhật Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];

            $adminModel = new AdminModel();
            $adminModel->updateAccount($id, $username, $password, $email, $dob, $roleId);

            // Chuyển hướng sau khi cập nhật thành công
            header('Location: index.php');
            exit();
        }
    }

    public function delete($id) {
        // Xử lý xóa Manager
        $adminModel = new AdminModel();
        $adminModel->deleteAccount($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php');
        exit();
    }
}
?>
