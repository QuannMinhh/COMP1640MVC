<?php 
require_once 'Models/CoordinatorModel.php';
require_once 'Models/ContributionModel.php';
class CoordinatorController {
    protected $model;

    public function __construct() {
        $this->model = new CoordinatorModel();
    }
    public function add_comment($id) {  
        ob_start() ;
       if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['role_id']==4){
        $con = new ContributionModel();
        $contribution = $con->getContributionById($id);
        require_once "views/contri_add_cmt.php" ;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Com_Detail = $_POST['Com_Detail'];
            $Con_ID = $_POST['Con_ID'];
            $Coor_ID = $_SESSION['userid'];
            $check = $this->model->checkDate($Con_ID);
            if($check == true) {
            $this->model->addComment($Com_Detail,$Con_ID,$Coor_ID);
            $this->model->changeStatus($Con_ID);
            header('location: index.php?action=contribution');
            exit;
            } else {

            }
        }
    }
    ob_end_flush() ;
}
public function download() {  
    $zip = new ZipArchive();
   $download = $this->model->download();
    $zipName = 'contributions.zip';
    $zip->open($zipName, ZipArchive::CREATE) ;
  
    foreach($download as $row) {
        
        $fileName = 'contribution_' . $row['Con_Name'] . '.doc';
     
        $fileContent = $row['con_doc'];
        
        $zip->addFromString($fileName, $fileContent);
    }
    
    
    $zip->close();
    
    header("Content-type: application/zip");
   
    header("Content-Disposition: attachment; filename=$zipName");
    //
    readfile($zipName);
    // 
    unlink($zipName);

}




}
?>