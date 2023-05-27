<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');

    
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {

        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $surname    = stripslashes($_REQUEST['surname']);
        $surname    = mysqli_real_escape_string($con, $surname);
        $studentNo    = stripslashes($_REQUEST['studentNo']);
        $studentNo    = mysqli_real_escape_string($con, $studentNo);
       
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
       
        $query    = "INSERT into `users` (name, surname, studentNo,password)
                     VALUES ('$name', '$surname', '$studentNo','" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("Location: success.php");
        } else {
            echo "<div class='formRegister'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    }
?>
    <form class="formRegister" action="" method="post">
            <h1 class="login-title">REGISTER</h1>
            <input type="text" class="login-input" name="name" placeholder="Name..." required />
            <input type="text" class="login-input" name="surname" placeholder="Surname..." required>
            <input type="text" class="login-input" name="studentNo" placeholder="Student Number..." required>
           
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="SIGN UP" class="login-button">
            <p class="link"><a href="index.php">Click to Login</a></p>
    </form>
</body>
</html>