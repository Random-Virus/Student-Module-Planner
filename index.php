<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['studentNo'])) {
        $studentNo = stripslashes($_REQUEST['studentNo']);    // removes backslashes
        $studentNo = mysqli_real_escape_string($con, $studentNo);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE studentNo='$studentNo'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['studentNo'] = $studentNo;
            header("Location: home.php");
        } else {
            echo "<script>alert('Credentials not found. Try again or create a new profile.')</script>";
            header("Refresh:0");
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">LOGIN</h1>
        <input type="text" class="login-input" name="studentNo" placeholder="Student number" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>