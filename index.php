<?php
session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->indexManager();
        break;
    // case 'add_manager':
    //     require_once 'Controllers/AdminController.php';
    //     $adminController = new AdminController();
    //     $adminController->add_manager();
    //     break;
    case 'insert_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_manager();
        break;
    // case 'edit_manager':
    //     require_once 'Controllers/AdminController.php';
    //     $adminController = new AdminController();
    //     $adminController->edit_manager($_GET['id']);
    //     break;
    case 'update_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_manager($_GET['id']);
        break;
    case 'delete_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_manager($_GET['id']);
        break;
    case 'student':
            require_once 'Controllers/AdminController.php';
            $adminController = new AdminController();
            $adminController->indexStudent();
            break;  
    case 'manager':
            require_once 'Controllers/AdminController.php';
            $adminController = new AdminController();
            $adminController->indexManager();
            break;   
    // case 'add_student':
    //     require_once 'Controllers/AdminController.php';
    //     $adminController = new AdminController();
    //     $adminController->add_student();
    //     break;
    case 'insert_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_student();
        break;
    // case 'edit_student':
    //     require_once 'Controllers/AdminController.php';
    //     $adminController = new AdminController();
    //     $adminController->edit_student($_POST['id']);
    //     break;
    case 'update_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_student($_GET['id']);
        break;
    case 'delete_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_student($_GET['id']);
        break;
    default:
        echo 'Error: Unknown action';
        break;
}
?>
