
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='Layout/userlogin.css'>
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' >
    <title>Login Page</title>
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="../index.php?action=login" >
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" id="txtusername" name="username" >
                <i class='bx bxs-user'></i>
              
            </div>

            <div class="input-box">
                <input type="password" id="txtpassword" placeholder="Password" name="password" >
                <i class='bx bxs-lock-alt'></i>
            
            </div>
            <div class="input-box">
            <select name="role_id" placeholder="log in with">
                    <option value=1>admin</option>
                    <option value=2 selected>student</option>
                    <option value=3>Manager</option>       
                    <option value=4>Coordinator</option>             
            </select>
            
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
           
            <button type="submit" name="submit" value="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Student doesn't have account?
                    <a href="#">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>