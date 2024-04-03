<?php 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upLoadContribution</title>
    
</head>
<body>
<div class="main--content">
       
       <?php 
       $search = false;
       include './Views/Layout/admin_navbar.php' ;
       
       ?>
     
       <div class="tabular--wrapper">
           <h2>Add contribution</h2>
           <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Con_Name">Contribution Name</label>
        <input type="text" class="form-control" id="Con_Name" name="Con_Name" required>
    </div>
    <div class="form-group">
        <label for="Con_SubmissionTime">Submission Time</label>
        <input type="date" class="form-control" id="Con_SubmissionTime" name="Con_SubmissionTime" required>
    </div>
    <div class="form-group">
        <label for="Con_Status">Status</label>
        <input type="text" class="form-control" id="Con_Status" name="Con_Status" required>
    </div>
    <div class="form-group">
        <label for="Stu_ID">Student ID</label>
        <input type="number" class="form-control" id="Stu_ID" name="Stu_ID" required>
    </div>
    <div class="form-group">
        <label for="Con_Doc">Document</label>
        <input type="file" class="form-control" id="Con_Doc" name="Con_Doc[]" required accept=".doc,.docx" multiple>
    </div>
    <div class="form-group">
    <label for="Con_Image">Image</label>
    <input type="file" class="form-control" id="Con_Image" name="Con_Image[]" required accept="image/*" multiple>
</div>
    <div class="form-group">
        <label for="Topic_ID">Topic ID</label>
        <input type="number" class="form-control" id="Topic_ID" name="Topic_ID" required>
    </div>
    <div class="form-group">
        <label for="Maga_ID">Magazine ID</label>
        <input type="number" class="form-control" id="Maga_ID" name="Maga_ID">
    </div>
    <button type="submit" class="btn btn-success">Add Contribution</button>
</form>


   </div>
</body>
</html>