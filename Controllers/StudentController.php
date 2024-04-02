<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'Models/StudentModel.php';

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
class StudentController{
    // public function addContribution(){
      
    //     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["Document"]))
    //     {
    //         $filedoc = $_FILES['Document'];
    //         $filename = $_FILES['Document']['name'];
    //         $temp = $_FILES['Document']['tmp_name'];
    //         if (move_uploaded_file($temp ,"Upload/" . $filename)) {
    //             echo "File uploaded successfully.";
    //            $this->mailNotiToCoordinator();
    //             // header ('location:views/download.php');
    //             // exit;
    //             // Tiếp tục xử lý nếu cần thiết
    //         } else {
    //             echo "Error uploading file.";
    //         }

    //     }  include "views/student/uploadContribution.php";
    // }
    protected $model;

    public function __construct() {
        $this->model = new StudentModel();
    }

    public function addContribution() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["Con_Doc"])) {
            // Lấy thông tin từ form
            if(isset($_FILES["Con_Image"])) { 
                foreach($_FILES["Con_Image"]["tmp_name"] as $key => $tmp_name) {
                    $imageDataArray[$key] = file_get_contents($_FILES["Con_Image"]["tmp_name"][$key]);
                }
            } else {
                $imageDataArray = [];
            }
            $contributionName = $_POST['Con_Name'];
            $submissionDate = $_POST['Con_SubmissionTime'];
            $status = $_POST['Con_Status'];
            $studentID = $_POST['Stu_ID'];
            $topicID = $_POST['Topic_ID'];
            $magazineID = $_POST['Maga_ID'];
            
            // Xử lý từng tệp tải lên
            $fileCount = count($_FILES['Con_Doc']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $filedoc = $_FILES['Con_Doc']['tmp_name'][$i];
                $filename = $_FILES['Con_Doc']['name'][$i];
                $uploadPath = "Upload/" . $filename;
    
                // Di chuyển tệp lên máy chủ
                if (move_uploaded_file($filedoc, $uploadPath)) {
                    // Thêm dữ liệu vào cơ sở dữ liệu bằng cách sử dụng phương thức trong model
                    $studentModel = new StudentModel();
                    $studentModel->addContribution($contributionName, $submissionDate, $status, $studentID, $uploadPath, $imageDataArray, $topicID, null, $magazineID);
                    
                    // Gửi email thông báo đến người phụ trách nếu cần
                    $this->mailNotiToCoordinator();
    
                    echo "File uploaded successfully.";
                } else {
                    echo "Error uploading file.";
                }
            }
        }  
        include "views/student/uploadContribution.php";
    }
    
    
    

public function mailNotiToCoordinator(){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                    
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                  
        $mail->Username   = 'revirokuchiha@gmail.com';                   
        $mail->Password   = 'lbkcwuxqgvmlpgzs';                                    
        $mail->Port       = 587;                                  
    
        //Recipients
        $mail->setFrom('revirokuchiha@gmail.com', 'Mailer');
        $mail->addAddress('	tminhvquan1212@gmail.com');            
        //Content
        $mail->isHTML(true);                               
        $mail->Subject = 'test';
        $mail->Body    = 'hi<b>hi bold!</b>';   
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}








}
?>