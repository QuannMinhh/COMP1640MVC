<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            text-align: center;
            text-transform: uppercase;
        }
</style>
<body>
    <?php 
        include 'Layout/admin_sidebar.php'
    ?>
    <div class="main--content">
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Student List</h2>
            <button style="margin-bottom: 10px" class="btn btn-primary">
            <a style="text-decoration: none; color:#fff"
            href="index.php?action=insert_student"><i class="bi bi-plus-square"></i> Add Student</a>
            </button>
            <!-- <a href="index.php?action=insert_coordinator">Add new coordinator</a> -->
        <table class="table table-bordered border-bold">
            <thead class="thread-dark">
                <tr class="table-primary table-bordered border-info-bold">
                    <!-- <th>ID</th> -->
                    <th>Userame</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>DOB</th>
                    <th>Faculty</th>
                    <th>Image</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $admin): ?>
                    <tr class="table-secondary">
                        <!-- <td><?php echo $admin['Stu_ID']; ?></td> -->
                        <td><?php echo $admin['Stu_Username']; ?></td>
                        <td><?php echo $admin['Stu_Email']; ?></td>
                        <td><?php echo $admin['Stu_FullName']; ?></td>
                        <td><?php echo $admin['Stu_DOB']; ?></td>
                        <td><?php echo $admin['Fa_Name']; ?></td>
                        <td>
                            
                            
                       <?php  
                        echo '<img src="data:image/*;base64,' . base64_encode($admin['Image']) . '" />';
                       ?>   
                        </td>
                        <td>
                        <button class="btn btn-success">
                            <a style="text-decoration: none; color:#fff"  
                            href="index.php?action=update_student&id=<?php echo $admin['Stu_ID']; ?>"><i class="bi bi-pencil-square"></i></a> 
                        </button>
                        <button class="btn btn-danger">
                            <a style="text-decoration: none; color:#fff" 
                            href="index.php?action=delete_student&id=<?php echo $admin['Stu_ID']; ?>" onclick="return confirm('Do you want to delete this account')"><i class="bi bi-trash"></i></a>
                        </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <br>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
