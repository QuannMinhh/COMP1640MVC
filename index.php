<?php
session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        if($_SESSION['is_login']== true && $_SESSION['role_id']== 1){
            header("Location: admin_index.php");
            exit;
        }
        else{
            header("Location:./views/university_index.php ");
            exit;
        }
      
    case 'admin':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->indexAdmin();
        break;      
   
    case 'insert_manager':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_manager();
        break;
   
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

    case 'insert_student':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_student();
        break;
   
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
    

    case 'coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->indexCoordinator();
        break;  
    case 'insert_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->insert_coordinator();
        break;     
    case 'update_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->update_coordinator($_GET['id']);
        break;
    case 'delete_coordinator':
        require_once 'Controllers/AdminController.php';
        $adminController = new AdminController();
        $adminController->delete_coordinator($_GET['id']);
        break;
    case 'login':    
            require_once 'Controllers/UserController.php';
            $UserController = new UserController();
            $UserController->login();     
        break;
        case 'register':
            require_once 'Controllers/UserController.php';
            $UserController = new UserController();
            $UserController->register();     
            break;   
    case 'logout':
   
            require_once 'Controllers/UserController.php';
        
            $UserController = new UserController();
           
            $UserController->logout();
       
            break;
    case 'upload':
        require_once 'Controllers/StudentController.php';
        
        $StudentController = new StudentController();
       
        $StudentController->addContribution();
        break;

        /////////////////////////////////////
        case 'contribution':
            require_once 'Controllers/ContributionController.php';
            $contributionController = new ContributionController();
            $contributionController->index();
            break;      
       
        case 'add_contribution':
            require_once 'Controllers/ContributionController.php';
            $contributionController = new ContributionController();
            $contributionController->add();
            break;
       
        case 'cmt_contribution':
            require_once 'Controllers/ContributionController.php';
            $contributionController = new ContributionController();
            $contributionController->edit($_GET['id']);
            break;
            
        case 'delete_contribution':
            require_once 'Controllers/ContributionController.php';
            $contributionController = new ContributionController();
            $contributionController->delete($_GET['id']);
            break;
            
        case 'index_topic':
            require_once 'Controllers/TopicController.php';
            $topicController = new TopicController();
            $topicController->index();
            break;  
        
        case 'add_topic':
            require_once 'Controllers/TopicController.php';
            $topicController = new TopicController();
            $topicController->add();
            break;
            
        case 'edit_topic':
            require_once 'Controllers/TopicController.php';
            $topicController = new TopicController();
            $topicController->edit($_GET['id']);
            break;  
            
        case 'delete_topic':
            require_once 'Controllers/TopicController.php';
            $topicController = new TopicController();
            $topicController->delete($_GET['id']);
            break;
        case 'add_comment':
            require_once 'Controllers/CoordinatorController.php';
            $coor = new CoordinatorController();
            $coor-> add_comment($_GET['id']);
            break;
        case 'download_zip':
                require_once 'Controllers/CoordinatorController.php';
                $coor = new CoordinatorController();
                $coor-> download();
                break;
            //////////////////
    default:
        echo 'Error: Unknown action';
        break;
}
?>
