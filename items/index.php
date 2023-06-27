<?php
    require_once "../config/connection.php";
    require_once "../helper/authentication.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Items</title>
</head>
<body>

    <?php
        require_once "../helper/header.php";
    ?>

    <form action="./process/add-process.php" method="POST">
        <h1 align="center">Add Item</h1>
        <table align="center">
            <tr>
                <td> Item Name </td>
                <td><input type="text" name="item_name"></td>
            </tr>

            <tr>
                <td> Category Name</td>
                <td>
                    <select name="id_category" style="width : 100%"> 
                        <?php
                            $sql = "SELECT * FROM categories";
                            $query = mysqli_query($conn, $sql);
                            while($data =mysqli_fetch_assoc($query)){
                                echo "<option value='$data[id]'> $data[name]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td> Price</td>
                <td><input type="number" name="price"></td>
            </tr>

            <tr>
                <td> Stock</td>
                <td><input type="number" name="stock"></td>
            </tr>

            <tr>
                <td> Date_Expired</td>
                <td><input type="date" name="date_expired" value="<?= date("Y-m-d")?>"></td>
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
            <td style="font-weight: bold">Item Name</td>
            <td style="font-weight: bold">Category</td>
            <td style="font-weight: bold">Price</td>
            <td style="font-weight: bold">Stock</td>
            <td style="font-weight: bold">Expired</td>
            <td style="font-weight: bold">Date Added</td>
            <td style="font-weight: bold">Date Updated </td>
            <td style="font-weight: bold">Actions</td>
        </tr>

        <?php
            $sql= "SELECT items.*, categories.name AS category_name FROM items INNER JOIN 
            categories ON categories.id = items.id_category";
            $query = mysqli_query($conn, $sql);
            $number = 1;
            while($data = mysqli_fetch_assoc($query)){
                //var_dump($data);

                
                ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['category_name'] ?></td>
                        <td>RP.<?= number_format($data['price'])?></td>
                        <td><?= number_format($data['stock']) ?></td>
                        <td><?= date("d F Y", strtotime($data['date_expired']) ) ?></td>
                        <td><?=  date("d F Y H:i:s", strtotime($data['date_added'])) ?></td>
                        <td>
                        <?php  
                            if(!is_null($data['date_updated'])){
                                echo date("d F Y H:i:s", strtotime ($data['date_updated']));
                            }
                            else{
                                echo "-";
                            }
                        ?>
                        </td>
                        <td><a href="edit.php?id=<?= $data['id'] ?>"> Edit </a> | <a href="delete.php?id=<?= $data['id'] ?>">
                         Delete</a></td>
                    </tr>
                <?php

            }
            
        ?>
    </table>
    
</body>
</html>