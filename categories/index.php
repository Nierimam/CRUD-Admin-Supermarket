<?php
    require_once "../config/connection.php";
    require_once "../helper/authentication.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
</head>
<body>

    <?php
        require_once "../helper/header.php";
    ?>

    <form action="./process/add-process.php" method="POST">
        <h1 align="center">Add Category</h1>
        <table align="center">
            <tr>
                <td> Category Name </td>
                <td><input type="text" name="category_name"></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    
    </form>
    <hr>

    <table cellpadding="5" border="1" align="center" style="border-collapse: collapse">
        <tr>
            <td style="font-weight: bold">#No</td>
            <td style="font-weight: bold">Category Name</td>
            <td style="font-weight: bold"> Date Added</td>
            <td style="font-weight: bold">Actions</td>
        </tr>

        <?php
            $sql= "SELECT * FROM categories ORDER BY name ASC";
            $query = mysqli_query($conn, $sql);
            $number = 1;
            while($data = mysqli_fetch_assoc($query)){
                //var_dump($data);

                
                ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?=  $data['name'] ?></td>
                        <td><?=  date("d F Y H:i:s", strtotime($data['date_added'])) ?></td>
                        <td><a href="edit.php?id=<?= $data['id'] ?>"> Edit </a> | <a href="delete.php?id=<?= $data['id'] ?>">
                         Delete</a></td>
                    </tr>
                <?php

            }
            
        ?>
    </table>
    
</body>
</html>