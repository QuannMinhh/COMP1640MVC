<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Coordinator</title>
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
        <h2>List of coordinator</h2>
        <button style="margin-bottom: 10px" class="btn btn-primary">
            <a style="text-decoration: none; color:#fff"
            href="index.php?action=insert_coordinator"><i class="bi bi-plus-square"></i> Add Coordinator</a>
        </button>
        <form method="POST">
            <label for="faculty">Choose faculty:</label>
        <select name="fa_id" >
                
                <?php 
                    foreach($faculty as $f){
                        echo " <option  value='".$f['Fa_ID']."'>" .$f['Fa_Name']."</option>";
                    }
                ?>

        </select>   
        <button type="submit" class="btn btn-success">go</button>
            </form>
        <table class="table table-bordered border-bold">
        <thead class="thread-dark">
            <tr class="table-primary table-bordered border-info-bold">
                <!-- <th>ID</th> -->
                <th>Name</th>
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
                    <!-- <td><?php echo $admin['Coor_ID']; ?></td> -->
                    <td><?php echo $admin['Coor_Username']; ?></td>
                    <td><?php echo $admin['Coor_Email']; ?></td>
                    <td><?php echo $admin['Coor_FullName']; ?></td>
                    <td><?php echo $admin['Coor_DOB']; ?></td>
                    <td><?php echo $admin['Fa_Name']; ?></td>
                    <td>
                    <?php  
                       if($admin['Image'] != null)
                        echo '<img  src="data:image/*;base64,' . base64_encode($admin['Image']) . '" />';
                       ?>   
                
                    </td>
                    <td>
                    <button class="btn btn-success">
                        <a style="text-decoration: none; color:#fff" 
                        href="index.php?action=update_coordinator&id=<?php echo $admin['Coor_ID']; ?>"><i class="bi bi-pencil-square"></i></a> 
                    </button>

                    <button class="btn btn-danger">
                        <a style="text-decoration: none; color:#fff"  
                        href="index.php?action=delete_coordinator&id=<?php echo $admin['Coor_ID']; ?>" onclick="return confirm('Do you want to delete this account')"><i class="bi bi-trash"></i></a>
                    </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>

</body>
</html>
