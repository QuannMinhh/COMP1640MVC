<?php
session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->index();
        break;
    case 'add':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->add();
        break;
    case 'insert':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->insert();
        break;
    case 'edit':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->edit($_GET['id']);
        break;
    case 'update':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->update($_GET['id']);
        break;
    case 'delete':
        require_once 'Controllers/ManagerController.php';
        $managerController = new ManagerController();
        $managerController->delete($_GET['id']);
        break;
    default:
        // Xử lý lỗi hoặc trường hợp không hợp lệ
        break;
}
?>
