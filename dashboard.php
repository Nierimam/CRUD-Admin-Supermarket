<?php
    require_once "helper/authentication.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>  
</head>
<body>

    <h1>Hello, <?= $_SESSION['fullname']?> </h1>
    <?php require_once "helper/header.php"?>  
    <hr>
    

</body>
</html>