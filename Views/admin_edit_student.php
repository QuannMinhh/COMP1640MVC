<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit admin Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            Sturgin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            Stux-width: 600px;
            Sturgin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        form {
            Sturgin-top: 20px;
        }
        .form-group {
            Sturgin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="password"], input[type="eStuil"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit student Account</h2>
        <form action="index.php?action=update_student&id=<?php echo $admin['Stu_ID']; ?>" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $admin['Stu_Username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $admin['Stu_Password']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $admin['Stu_Email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Fullname:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $admin['Stu_FullName']; ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $admin['Stu_DOB']; ?>" required>
            </div>
            <div class="form-group">
                <label for="role_id">Role ID:</label>
                <input type="number" id="role_id" name="role_id" value="<?php echo $admin['Role_ID']; ?>" required>
            </div>
            <div class="form-group">
                <label for="role_id">Faculty:</label>
                <input type="number" id="fa_id" name="fa_id" value="<?php echo $admin['Fa_ID']; ?>" required>
            </div>
            
            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
