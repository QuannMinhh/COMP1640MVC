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
           <form  method="POST" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="con_name">Contribution Name</label>
                   <input type="text" class="form-control" id="con_name" name="con_name" required>
               </div>
               <div class="form-group">
                   <label for="password">Doc file</label>
                   <input type="file"  id="password" name="Document" accept=".doc,.docx" required>
               </div>
               <div class="form-group">
               <label for="avatar">Image:</label>
           <input type="file" id="image" name="image" accept="image/*" >
               </div>
               <div class="form-group">
                   <label for="email">Topic ID</label>
                   <input type="number" class="form-control" id="fullname" name="topic_id" value="1" required>
               </div>
            
              
               <button type="submit" class="btn btn-success">Add Contribution</button>
           </form>
       </div>
   </div>
</body>
</html>