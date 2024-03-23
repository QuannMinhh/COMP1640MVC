<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manager Account</title>
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
        <?php include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
        <h2>Add Manager Account</h2>
        <form  method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
                        $username = $_POST["username"];
                        if (empty($username)) {
                            echo '<div class="text-danger">Username không được để trống.</div>';
                        } else {
                            // Kiểm tra độ dài và ký tự đặc biệt của Username
                            if (!preg_match('/^[a-zA-Z0-9]{4,10}$/', $username)) {
                                echo '<div class="text-danger">Username phải có độ dài từ 4 đến 10 ký tự và không chứa ký tự đặc biệt.</div>';
                            }
                        }
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"])) {
                        $password = $_POST["password"];
                        if (empty($password)) {
                            echo '<div class="text-danger">Password không được để trống.</div>';
                        } else {
                            // Thêm các điều kiện kiểm tra khác tại đây nếu cần
                        }
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
                        $email = $_POST["email"];
                        if (empty($email)) {
                            echo '<div class="text-danger">Email không được để trống.</div>';
                        } else {
                            // Thêm các điều kiện kiểm tra khác tại đây nếu cần
                        }
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" >
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dob"])) {
                        $dob = $_POST["dob"];
                        if (empty($dob)) {
                            echo '<div class="text-danger">Date of Birth không được để trống.</div>';
                        } else {
                            // Thêm các điều kiện kiểm tra khác tại đây nếu cần
                        }
                    }
                ?>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="role_id" value="2" name="role_id" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/*" >
                </div>
            <button type="submit" class="btn btn-success">Add Account</button>
            <!-- <input type="submit" value="Add Account"> -->
        </form>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
