<?php

    require_once "../../config/connection.php";
    require_once "../../helper/alert.php";

    if(isset($_POST['submit'])){
        $itemName = mysqli_real_escape_string($conn, $_POST['item_name']);
        $idCategory = mysqli_real_escape_String($conn, $_POST['id_category']);
        $price = mysqli_real_escape_String($conn, $_POST['price']);
        $stock = mysqli_real_escape_String($conn, $_POST['stock']);
        $dateExpired = mysqli_real_escape_String($conn, $_POST['date_expired']);
        
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        if(!empty($itemName) && is_numeric($idCategory) && is_numeric($price) && is_numeric($stock) && !empty($dateExpired)){
            $sql = "UPDATE items SET name='$itemName', id_category =$idCategory, price=$price, stock=$stock, date_expired='$dateExpired', date_updated=now() WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            if($query){
                alert("Data Is Sucssesfully Updated", "../index.php");
            }
            else{
                $error = mysqli_error($conn);
                alert("Something Error! $error", "../index.php");
            }
        }
        else{
            alert("Please Fill All form", "../index.php");
        }
    }
    else{
        header('location: ../index.php');
    }

?>