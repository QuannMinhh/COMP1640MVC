<?php
session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->index();
        break;
    case 'add':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->add();
        break;
    case 'insert':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert();
        break;
    case 'edit':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->edit($_GET['id']);
        break;
    case 'update':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update($_GET['id']);
        break;
    case 'delete':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete($_GET['id']);
        break;
    default:
        echo 'Error: Unknown action';
        break;
}
?>
