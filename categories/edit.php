<?php

    require_once "../config/connection.php";
    require_once "../helper/alert.php";
    require_once "../helper/authentication.php";

    if(is_numeric($_GET['id'])){
        $id= mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM categories WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        $total = mysqli_num_rows($query);

        if($total == 1){
            $data = mysqli_fetch_assoc($query);
           // var_dump($data);
        }
        else{
            alert("Data Not Found!", "./index.php");
        }

    }
    else{
        header("location: .index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

    <?php
        require_once "../helper/header.php";
    ?>

<form action="./process/edit-process.php" method="POST">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <h1 align="center">Edit Category</h1>
        <table align="center">
            <tr>
                <td> Category Name </td>
                <td><input type="text" name="category_name" value="<?= $data['name'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    
    </form>
    
</body>
</html>