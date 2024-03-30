<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Topic</title>
  <?php 
    include './Views/Layout/admin_navbar.php' ;
  ?>
</head>
<body>
<form  method="POST" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="con_name"> Name</label>
                   <input type="text" class="form-control" id="con_name" name="con_name" required>
               </div>
               <div class="form-group">
                   <label for="con_name"> Start date</label>
                   <input type="date" class="form-control" id="con_name" name="con_name" required>
               </div>
                 
               <button type="submit" class="btn btn-success">Add Contribution</button>
           </form>
</body>
</html>