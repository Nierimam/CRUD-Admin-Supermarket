<?php
    session_start();
    if(isset($_SESSION['fullname'])){
        header('location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

    <form action="login-process.php" method="POST">
    <h1>Login</h1>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="Password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>