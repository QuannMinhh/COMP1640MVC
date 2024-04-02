<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "UserController.php";
include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
require_once 'Models/StudentModel.php';
class StudentController{
    public function addContribution(){
      
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["Document"]))
        {
            $filedoc = $_FILES['Document'];
            $filename = $_FILES['Document']['name'];
            $temp = $_FILES['Document']['tmp_name'];
            if (move_uploaded_file($temp ,"Upload/" . $filename)) {
                echo "File uploaded successfully.";
               $this->mailNotiToCoordinator("test123");
                // header ('location:views/download.php');
                // exit;
              
            } else {
                echo "Error uploading file.";
            }
        }  include "views/student/uploadContribution.php";
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
        $mail->setFrom('revirokuchiha@gmail.com', 'Test mail');
        $mail->addAddress('	hohuy2k2@gmail.com');            
        //Content
        $mail->isHTML(true);                               
        $mail->Subject = 'test';
        $mail->Body    = 'content test<b> bold!</b>';   
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

public function indexStudent() {
    $user = new UserController();
    $is_login = $user->is_login();
    if($is_login == true && $_SESSION['role_id'] == 2 ) {
        $studentModel = new StudentModel();
        $studentInfo = $studentModel->getStudentByUsername($_SESSION['user_name']);

        // Chuyển thông tin sinh viên cho View để hiển thị
        include 'views/student/student_index.php';
    }
}








}
?>