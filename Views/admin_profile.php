<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Account</title>
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
    <?php  $search = true; include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
            <h2>Admin profile</h2>
            <?php foreach ($admin as $admin): ?>
            <div class="profile-container text-center">
            <img src="<?php echo ($admin['Image'] != null) ? 'data:image/*;base64,' . base64_encode($admin['Image']) : 'placeholder_image_url.jpg'; ?>" alt="Profile Picture" class="profile-img mb-3">

            <h2 class="mb-3"><?php echo $admin['Ad_Username'] ; ?>
            <p class="text-muted">Admin</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Email:</strong> <?php echo $admin['Ad_Email'] ; ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>DOB:</strong> <?php echo $admin['Ad_DOB'] ; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>