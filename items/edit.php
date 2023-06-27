<?php

    require_once "../config/connection.php";
    require_once "../helper/alert.php";
    require_once "../helper/authentication.php";

    if(is_numeric($_GET['id'])){
        $id= mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM items WHERE id=$id";
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
        <h1 align="center">Edit Item</h1>
        <table align="center">
            <tr>
                <td> Item Name </td>
                <td><input type="text" name="item_name" value="<?= $data['name'] ?>"></td>
            </tr>

            <tr>
                <td> Category Name</td>
                <td>
                    <select name="id_category" style="width : 100%"> 
                        <?php
                            $sql = "SELECT * FROM categories";
                            $query = mysqli_query($conn, $sql);
                            while($data_category =mysqli_fetch_assoc($query)){
                                if($data['id_category'] == $data_category['id']){
                                    echo"<option value = '$data_category[id]' selected> $data_category[name]</option>";
                                }
                                else{
                                    echo"<option value = '$data_category[id]'> $data_category[name]</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td> Price</td>
                <td><input type="number" name="price" value="<?= $data['price'] ?>"></td>
            </tr>

            <tr>
                <td> Stock</td>
                <td><input type="number" name="stock" value="<?= $data['stock'] ?>"></td>
            </tr>

            <tr>
                <td> Date_Expired</td>
                <td><input type="date" name="date_expired" value="<?= date("Y-m-d", 
                strtotime($data['date_expired'])) ?>"></td>
            </tr>

            <tr>
                <td colspan="2" align="right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    
    </form>
    
</body>
</html>