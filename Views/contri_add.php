<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Topic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
<form action="index.php?action=add_contribution" method="POST" enctype="multipart/form-data">
    <label for="Con_Name">Tên Contribution:</label>
    <input type="text" name="Con_Name" id="Con_Name" required>
    <br>
    <label for="Con_SubmissionTime">Thời gian nộp:</label>
    <input type="date" name="Con_SubmissionTime" id="Con_SubmissionTime" required>
    <br>
    <label for="Con_Status">Trạng thái:</label>
    <input type="text" name="Con_Status" id="Con_Status" required>
    <br>
    <label for="Stu_ID">ID Sinh viên:</label>
    <input type="number" name="Stu_ID" id="Stu_ID" required>
    <br>
    <label for="Con_Doc">Tệp DOC:</label>
    <input type="file" name="Con_Doc" id="Con_Doc" required accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
    <br>
    <label for="Con_Image">Ảnh:</label>
    <input type="file" name="Con_Image" id="Con_Image" accept="image/*">
    <br>
    <label for="Topic_ID">ID Chủ đề:</label>
    <input type="number" name="Topic_ID" id="Topic_ID" >
    <br>
    <label for="Com_ID">ID Bình luận:</label>
    <input type="hidden" name="Com_ID" id="Com_ID" value=1>
    <br>
    <label for="Maga_ID">ID Tạp chí:</label>
    <input type="number" name="Maga_ID" id="Maga_ID">
    <br>
    <input type="submit" value="Thêm">
</form>




    <!-- Bao gồm thư viện jQuery và Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', 
                autoclose: true, 
                todayHighlight: true 
            });
        });
    </script>
</body>
</html>
