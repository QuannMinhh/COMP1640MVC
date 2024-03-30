<?php
require_once 'Models/TopicModel.php';

class TopicController {
    private $topicModel;

    public function __construct() {
        $this->topicModel = new TopicModel();
    }

    public function index() {
        $topics = $this->topicModel->getAllTopic();
        include 'views/topic_list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $startDate = $_POST['start_date'];
            $closureDate = $_POST['closure_date'];
            $finaleDate = $_POST['finale_date'];
            $description = $_POST['description'];
            $fa_id = $_POST['fa_id']; // Lấy giá trị fa_id từ form
            // Thêm chủ đề vào cơ sở dữ liệu
            $this->topicModel->addTopic($name, $startDate, $closureDate, $finaleDate, $description, $fa_id);
            // Chuyển hướng sau khi thêm thành công
            header('Location: index.php?action=index');
            exit();
        } else {
            include 'views/topic_add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $startDate = $_POST['start_date'];
            $closureDate = $_POST['closure_date'];
            $finaleDate = $_POST['finale_date'];
            $description = $_POST['description'];
            $fa_id = $_POST['fa_id']; // Lấy giá trị fa_id từ form
            // Cập nhật chủ đề trong cơ sở dữ liệu
            $this->topicModel->updateTopic($id, $name, $startDate, $closureDate, $finaleDate, $description, $fa_id);
            // Chuyển hướng sau khi cập nhật thành công
            header('Location: index.php?action=index');
            exit();
        } else {
            $topic = $this->topicModel->getTopicById($id);
            include 'views/topic_edit.php';
        }
    }

    public function delete($id) {
        // Xóa chủ đề khỏi cơ sở dữ liệu
        $this->topicModel->deleteTopic($id);
        // Chuyển hướng sau khi xóa thành công
        header('Location: index.php?action=index');
        exit();
    }
}
?>
