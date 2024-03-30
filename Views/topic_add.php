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
    <h1>Add Topic</h1>
    <form method="post" action="index.php?action=add_topic">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="start_date">Start Date:</label><br>
        <input type="text" id="start_date" name="start_date" class="datepicker"><br>
        <label for="closure_date">Closure Date:</label><br>
        <input type="text" id="closure_date" name="closure_date" class="datepicker"><br>
        <label for="finale_date">Finale Date:</label><br>
        <input type="text" id="finale_date" name="finale_date" class="datepicker"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="fa_id">Faculty ID:</label><br>
        <input type="text" id="fa_id" name="fa_id"><br>
        <input type="submit" value="Add">
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
