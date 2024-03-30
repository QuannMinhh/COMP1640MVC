<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topic</title>
    <!-- Bao gồm CSS của Bootstrap và Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
    <h1>Edit Topic</h1>
    <form method="post" action="index.php?action=edit&id=<?php echo $topic['Topic_ID']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $topic['Topic_Name']; ?>"><br>
        <label for="start_date">Start Date:</label><br>
        <input type="text" id="start_date" name="start_date" class="datepicker" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : $topic['Topic_StartDate']; ?>"><br>
        <label for="closure_date">Closure Date:</label><br>
        <input type="text" id="closure_date" name="closure_date" class="datepicker" value="<?php echo isset($_POST['closure_date']) ? $_POST['closure_date'] : $topic['Topic_ClosureDate']; ?>"><br>
        <label for="finale_date">Finale Date:</label><br>
        <input type="text" id="finale_date" name="finale_date" class="datepicker" value="<?php echo isset($_POST['finale_date']) ? $_POST['finale_date'] : $topic['Topic_FinaleDate']; ?>"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : $topic['Topic_Description']; ?></textarea><br>
        <label for="fa_id">Faculty ID:</label><br>
        <input type="text" id="fa_id" name="fa_id" value="<?php echo isset($_POST['fa_id']) ? $_POST['fa_id'] : $topic['Fa_ID']; ?>"><br>
        <input type="submit" value="Update">
    </form>

    <!-- Bao gồm thư viện jQuery và Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bao gồm JS của Bootstrap Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Khởi tạo Bootstrap Datepicker cho các trường ngày
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', // Định dạng ngày
                autoclose: true, // Tự động đóng Datepicker khi người dùng chọn ngày
                todayHighlight: true // Highlight ngày hiện tại
            });
        });
    </script>
</body>
</html>
