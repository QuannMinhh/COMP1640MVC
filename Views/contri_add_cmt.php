<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coordinator Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
    <style>
        .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
        }
        .main--content .tabular--wrapper {
            background: #fff;
            margin-top: 1rem;
            border-radius: 10px;
            padding: 10px 2rem;
        }

        h2 {
            color: rgba(113, 99, 186, 255);
            padding-bottom: 10px;
            font-size: 25px;
        }
        label {
            color: #4B0082;
            font-weight: 600; 
        }
    </style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php  $search=false; include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
        
        <h2>Sửa Contribution</h2>
     
<form  method="POST" >


<div class="form-group">
    <label for="Con_Name">Tên Contribution:</label>
    <input type="hidden" name="Con_ID" id="Con_Name" value="<?php echo $contribution['Con_ID']; ?>" >
    <input type="text" name="Con_Name" id="Con_Name" value="<?php echo $contribution['Con_Name']; ?>" >
    </div>
    <div class="form-group">
    <label for="Con_SubmissionTime">Thời gian nộp:</label>
    <input type="text" name="Con_SubmissionTime" id="Con_SubmissionTime" value="<?php echo $contribution['Con_SubmissionTime']; ?>" readonly>
    </div>
    <div class="form-group">
    <label for="Con_Status">Trạng thái:</label>
    <input type="text" name="Con_Status" id="Con_Status" value="<?php echo $contribution['Con_Status']; ?>" readonly>
    </div>
    <div class="form-group">
    <label for="Stu_ID">ID Sinh viên:</label>
    <input type="text" name="Stu_ID" id="Stu_ID" value="<?php echo $contribution['Stu_ID']; ?>" readonly>
    </div>
   
    <div class="form-group">
    <label for="Topic_ID">ID Chủ đề:</label>
    <input type="text" name="Topic_ID" id="Topic_ID" value="<?php echo $contribution['Topic_ID']; ?>" readonly>
    </div>
    <div class="form-group">
    <label for="Stu_ID">Content:</label>
    <iframe src="https://docs.google.com/gview?url=<?php echo urlencode($contribution['Con_Doc']); ?>&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>

    </div>
    <div class="form-group">
    <label for="Com_ID">comment:</label>
    <input type="text" name="Com_Detail" id="Com_ID"  required>
    </div>
    <div class="form-group">
    <label for="Maga_ID">ID Tạp chí:</label>
    <input type="text" name="Maga_ID" id="Maga_ID" value="<?php echo $contribution['Maga_ID']; ?>" readonly>
    </div>
    <input class="btn btn-success" type="submit" value="Lưu">
</form>


        </div>
    </div>
</body>
</html>
