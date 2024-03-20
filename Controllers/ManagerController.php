<?php
require_once 'Models/ManagerModel.php';

class ManagerController {
    public function index() {
        // Hiển thị danh sách Manager
        $managerModel = new ManagerModel();
        $managers = $managerModel->getAllManagers();
        include 'views/manager_list.php';
    }

    public function add() {
        // Hiển thị form thêm mới Manager
        include 'views/manager_add.php';
    }

    public function insert() {
        // Xử lý thêm mới Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];

            $managerModel = new ManagerModel();
            $managerModel->addManager($username, $password, $email, $dob, $roleId);

            // Chuyển hướng sau khi thêm thành công
            header('Location: index.php');
            exit();
        }
    }

    public function edit($id) {
        // Hiển thị form chỉnh sửa Manager
        $managerModel = new ManagerModel();
        $manager = $managerModel->getManagerById($id);
        include 'views/manager_edit.php';
    }

    public function update($id) {
        // Xử lý cập nhật Manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $roleId = $_POST['role_id'];

            $managerModel = new ManagerModel();
            $managerModel->updateManager($id, $username, $password, $email, $dob, $roleId);

            // Chuyển hướng sau khi cập nhật thành công
            header('Location: index.php');
            exit();
        }
    }

    public function delete($id) {
        // Xử lý xóa Manager
        $managerModel = new ManagerModel();
        $managerModel->deleteManager($id);

        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php');
        exit();
    }
}
?>
