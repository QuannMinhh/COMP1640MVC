<?php
require_once 'Models/ContributionModel.php';
require_once 'vendor/autoload.php';



class ContributionController {
    protected $model;

    public function __construct() {
        $this->model = new ContributionModel();
    }

    public function index() {
        $contributions = $this->model->getAllContribution();
        include 'views/contri_list.php';
    }
    

    public function add() {
        include 'views/contri_add.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['Con_Doc'])) {
            // Lấy dữ liệu từ form
            $conname = $_POST['Con_Name'];
            $subDate = $_POST['Con_SubmissionTime'];
            $status = $_POST['Con_Status'];
            $stuID = $_POST['Stu_ID'];
            $topicID = $_POST['Topic_ID'];
            $comID = $_POST['Com_ID'];
            $magaID = $_POST['Maga_ID'];
            
            // Xử lý tệp tin ảnh
            $imageData = null;
            if(isset($_FILES['Con_Image']) && $_FILES['Con_Image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpName = $_FILES['Con_Image']['tmp_name'];
                $imageData = base64_encode(file_get_contents($imageTmpName));
            }
    
            // Xử lý tệp tin Word
            $docData = $_FILES['Con_Doc']['tmp_name'];
            
            // Kiểm tra xem tệp tin có tồn tại hay không
            if (file_exists($docData)) {
                // Sử dụng PHPWord để đọc nội dung của tệp tin Word
                $phpWord = \PhpOffice\PhpWord\IOFactory::load($docData);
    
                // Lấy nội dung văn bản từ các phần của tài liệu Word
                $text = '';
    
                foreach ($phpWord->getSections() as $section) {
                    foreach ($section->getElements() as $element) {
                        if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                            $text .= $element->getText();
                        }
                    }
                }
    
                // Lưu nội dung vào cơ sở dữ liệu
                $this->model->addContribution($conname, $subDate, $status, $stuID, $text, $imageData, $topicID, $comID, $magaID);
    
                // Chuyển hướng sau khi thêm Contribution thành công
                header('Location: index.php?action=contribution');
                exit();
            }
        }
    }
    
    

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý dữ liệu được gửi từ form
            $conname = $_POST['Con_Name'];
            $subDate = $_POST['Con_SubmissionTime'];
            $status = $_POST['Con_Status'];
            $stuID = $_POST['Stu_ID'];
            $doc = $_POST['Con_Doc'];
            $image = $_POST['Con_Image'];
            $topicID = $_POST['Topic_ID'];
            $comID = $_POST['Com_ID'];
            $magaID = $_POST['Maga_ID'];

            $this->model->updateContribution($conname, $subDate, $status, $stuID, $doc, $image, $topicID, $comID, $magaID);

            // Chuyển hướng sau khi cập nhật Contribution thành công
            header('Location: index.php?action=contribution');
            exit();
        } else {
            // Lấy dữ liệu cần chỉnh sửa từ model
            $contribution = $this->model->getContributionById($id);
            // Hiển thị form chỉnh sửa với dữ liệu đã có
            require_once 'views/contri_add_cmt.php';
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteContribution($id);
            // Chuyển hướng sau khi xóa Contribution thành công
            header('Location: index.php?action=contribution');
            exit();
        } 
    }
}